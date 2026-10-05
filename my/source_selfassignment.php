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

/**
 * Confirm self-assignment to certification.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use tool_mulib\muform\handler;

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */
/** @var stdClass $USER */

require('../../../../config.php');

$sourceid = required_param('sourceid', PARAM_INT);

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new \core\url('/admin/tool/mucertify/my/source_selfassignment.php', ['sourceid' => $sourceid]));

require_login();

if (!\tool_mulib\local\mulib::is_mucertify_active()) {
    redirect(new \core\url('/'));
}

$source = $DB->get_record('tool_mucertify_source', ['id' => $sourceid, 'type' => 'selfassignment'], '*', MUST_EXIST);
$certification = $DB->get_record('tool_mucertify_certification', ['id' => $source->certificationid], '*', MUST_EXIST);
$certificationcontext = context::instance_by_id($certification->contextid);

if (!\tool_mucertify\local\source\selfassignment::can_user_request($certification, $source, $USER->id)) {
    redirect(new \core\url('/admin/tool/mucertify/my/certification.php', ['id' => $certification->id]));
}

// Certification page redirects back to catalogue if user is not assigned.
$returnurl = new \core\url('/admin/tool/mucertify/my/certification.php', ['id' => $certification->id]);

$handler = handler::from_request();

$form = new tool_mucertify\local\form\source_selfassignment($PAGE->url, [], ['source' => $source]);

if ($form->is_cancelled()) {
    $handler->cancelled($returnurl);
}

if ($data = $form->get_data()) {
    tool_mucertify\local\source\selfassignment::signup($certification->id, $source->id);
    $handler->submitted($returnurl);
}

$handler->render($form, get_string('source_selfassignment_assign', 'tool_mucertify'));
