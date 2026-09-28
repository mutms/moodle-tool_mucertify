<?php
// This file is part of MuTMS suite of plugins for Moodle™ LMS.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.

// phpcs:disable moodle.Files.BoilerplateComment.CommentEndedTooSoon
// phpcs:disable moodle.Files.LineLength.TooLong

/**
 * certification management interface.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use tool_mucertify\local\source\manual;
use tool_mulib\muform\handler;

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */

require('../../../../config.php');

$sourceid = required_param('sourceid', PARAM_INT);

require_login();

$source = $DB->get_record('tool_mucertify_source', ['id' => $sourceid, 'type' => 'manual'], '*', MUST_EXIST);
$certification = $DB->get_record('tool_mucertify_certification', ['id' => $source->certificationid], '*', MUST_EXIST);
$context = context::instance_by_id($certification->contextid);
require_capability('tool/mucertify:assign', $context);

$currenturl = new \core\url('/admin/tool/mucertify/management/source_manual_assign.php', ['sourceid' => $source->id]);
$PAGE->set_context($context);
$PAGE->set_url($currenturl);
$title = get_string('source_manual_assignusers', 'tool_mucertify');
$PAGE->set_title($title);
$PAGE->set_heading($title);

$returnurl = new \core\url('/admin/tool/mucertify/management/certification_users.php', ['id' => $certification->id]);

if (!manual::is_assignment_possible($certification, $source)) {
    redirect($returnurl);
}

$handler = handler::from_request();

$settings = \tool_mucertify\local\certification::get_periods_settings($certification);
$now = time();
$current = ['timewindowstart' => $now, 'timewindowdue' => ($settings->due1 !== null) ? $now + $settings->due1 : null];
$form = new \tool_mucertify\local\form\source_manual_assign($currenturl, $current, ['certification' => $certification]);

if ($form->is_cancelled()) {
    $handler->cancelled($returnurl);
}

if ($data = $form->get_data()) {
    $userids = [];
    $assignmentids = [];
    if ($data->cohortid) {
        $userids = $DB->get_fieldset_select('cohort_members', 'userid', "cohortid = ?", [$data->cohortid]);
    }
    if ($data->users) {
        $userids = array_merge($userids, $data->users);
        $userids = array_unique($userids);
    }
    if ($userids) {
        $dateoverrides = ['timewindowstart' => $data->timewindowstart, 'timewindowdue' => $data->timewindowdue];
        if (!empty($data->timeuntil)) {
            $dateoverrides['timeuntil'] = $data->timeuntil;
        }
        $assignmentids = manual::assign_users($certification->id, $source->id, $userids, $dateoverrides);
    }

    foreach ($assignmentids as $assignmentid) {
        $form->get_element('customfields')->save($assignmentid);
    }

    $handler->submitted($returnurl);
}

$handler->render($form);
