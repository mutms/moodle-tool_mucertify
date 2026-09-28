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

use tool_mucertify\local\period;
use tool_mulib\muform\handler;

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */

require('../../../../config.php');

$assignmentid = required_param('assignmentid', PARAM_INT);

require_login();

$assignment = $DB->get_record('tool_mucertify_assignment', ['id' => $assignmentid], '*', MUST_EXIST);
$certification = $DB->get_record('tool_mucertify_certification', ['id' => $assignment->certificationid], '*', MUST_EXIST);
$source = $DB->get_record('tool_mucertify_source', ['id' => $assignment->sourceid], '*', MUST_EXIST);

$context = context::instance_by_id($certification->contextid);
require_capability('tool/mucertify:admin', $context);

$currenturl = new \core\url('/admin/tool/mucertify/management/period_create.php', ['assignmentid' => $assignment->id]);
$PAGE->set_context($context);
$PAGE->set_url($currenturl);
$title = get_string('period_create', 'tool_mucertify');
$PAGE->set_title($title);
$PAGE->set_heading($title);

$returnurl = new \core\url('/admin/tool/mucertify/management/assignment.php', ['id' => $assignment->id]);

$user = $DB->get_record('user', ['id' => $assignment->userid], '*', MUST_EXIST);

$handler = handler::from_request();

$settings = \tool_mucertify\local\certification::get_periods_settings($certification);
$firstperiod = $DB->record_exists('tool_mucertify_period', ['certificationid' => $certification->id, 'userid' => $user->id, 'first' => 1]);
$current = period::get_default_dates($certification, $user->id, []);
$current['userfullname'] = fullname($user);
$current['programid'] = $firstperiod ? $settings->programid2 : $settings->programid1;
$form = new \tool_mucertify\local\form\period_create($currenturl, $current, ['certificationid' => $certification->id]);

if ($form->is_cancelled()) {
    $handler->cancelled($returnurl);
}

if ($data = $form->get_data()) {
    $data->assignmentid = $assignment->id;
    $period = period::add($data);
    $handler->submitted($returnurl);
}

$handler->render($form);
