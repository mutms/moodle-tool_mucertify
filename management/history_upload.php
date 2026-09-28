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
 * Uploads user history for certifications.
 *
 * @package    tool_mucertify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @author     Farhan Karmali
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use tool_mucertify\local\form\history_upload_file;
use tool_mucertify\local\form\history_upload_options;
use tool_mulib\muform\handler;

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */

require('../../../../config.php');

$certificationid = required_param('certificationid', PARAM_INT);
$csvfile = optional_param('csvfile', 0, PARAM_INT);

require_login();

$certification = $DB->get_record('tool_mucertify_certification', ['id' => $certificationid, 'archived' => 0], '*', MUST_EXIST);
$source = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification->id, 'type' => 'manual']);
$context = context::instance_by_id($certification->contextid);
require_capability('tool/mucertify:admin', $context);

$currenturl = new \core\url('/admin/tool/mucertify/management/history_upload.php', ['certificationid' => $certification->id]);
$PAGE->set_context($context);
$PAGE->set_url($currenturl);
$title = get_string('history_upload', 'tool_mucertify');
$PAGE->set_title($title);
$PAGE->set_heading($title);

$returnurl = new \core\url('/admin/tool/mucertify/management/certification_users.php', ['id' => $certification->id]);

$sourceclass = \tool_mucertify\local\assignment::get_source_classname('manual');
if (!$sourceclass::is_assignment_possible($certification, $source)) {
    redirect($returnurl);
}

$handler = handler::from_request();

// Rows parsed in the first step are stored in the user's upload area.
$filedata = \tool_mucertify\local\util::get_uploaded_data($csvfile);
$extra = ['filedata' => $filedata, 'source' => $source, 'context' => $context];

if (!$filedata) {
    $form = new history_upload_file($currenturl, []);
    if ($form->is_cancelled()) {
        $handler->cancelled($returnurl);
    }
    if ($data = $form->get_data()) {
        $nexturl = new \core\url($currenturl, ['csvfile' => $data->csvfile]);
        if ($handler->is_dialog()) {
            // The dialog continues with the second step, the page gets it from the next URL.
            $extra['filedata'] = \tool_mucertify\local\util::get_uploaded_data((int)$data->csvfile);
            $handler->render(new history_upload_options($nexturl, [], $extra));
        }
        redirect($nexturl);
    }
    $handler->render($form);
}

$form = new history_upload_options(new \core\url($currenturl, ['csvfile' => $csvfile]), [], $extra);

if ($form->is_cancelled()) {
    $handler->cancelled($returnurl);
}

if ($data = $form->get_data()) {
    $data->certificationid = $certification->id;
    $result = \tool_mucertify\local\period::process_history_upload($data, $filedata);

    if ($result['assigned']) {
        $message = get_string('history_upload_result_assigned', 'tool_mucertify', $result['assigned']);
        \core\notification::add($message, \core\output\notification::NOTIFY_SUCCESS);
    }
    if ($result['periods']) {
        $message = get_string('history_upload_result_periods', 'tool_mucertify', $result['periods']);
        \core\notification::add($message, \core\output\notification::NOTIFY_SUCCESS);
    }
    if ($result['skipped']) {
        $message = get_string('history_upload_result_skipped', 'tool_mucertify', $result['skipped']);
        \core\notification::add($message, \core\output\notification::NOTIFY_INFO);
    }
    if ($result['errors']) {
        $message = get_string('history_upload_result_errors', 'tool_mucertify', $result['errors']);
        \core\notification::add($message, \core\output\notification::NOTIFY_WARNING);
    }

    $handler->submitted($returnurl);
}

$handler->render($form);
