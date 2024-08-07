<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Uploads user history for certifications.
 *
 * @package    tool_certify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @author     Farhan Karmali
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */

use tool_certify\local\management;
use tool_certify\local\source\manual;

if (!empty($_SERVER['HTTP_X_LEGACY_DIALOG_FORM_REQUEST'])) {
    define('AJAX_SCRIPT', true);
}

require('../../../../config.php');

$certificationid = required_param('certificationid', PARAM_INT);
$draftitemid = optional_param('csvfile', null, PARAM_INT);

require_login();

$certification = $DB->get_record('tool_certify_certifications', ['id' => $certificationid, 'archived' => 0], '*', MUST_EXIST);
$source = $DB->get_record('tool_certify_sources', ['certificationid' => $certification->id, 'type' => 'manual']);
$context = context::instance_by_id($certification->contextid);
require_capability('tool/certify:admin', $context);

$currenturl = new moodle_url('/admin/tool/certify/management/history_upload.php', ['certification' => $certificationid]);
$returnurl = new moodle_url('/admin/tool/certify/management/certification_users.php', ['id' => $certification->id]);

management::setup_certification_page($currenturl, $context, $certification);

$filedata = null;
if ($draftitemid && confirm_sesskey()) {
    $filedata = \tool_certify\local\util::get_uploaded_data($draftitemid);
}

if (!$filedata) {
    $form = new \tool_certify\local\form\history_upload_file(null, [
        'certification' => $certification, 'context' => $context]);
} else {
    $form = new \tool_certify\local\form\history_upload_options(null, [
        'certification' => $certification, 'source' => $source,
        'context' => $context, 'csvfile' => $draftitemid, 'filedata' => $filedata]);
}

if ($form->is_cancelled()) {
    redirect($returnurl);
}

if ($data = $form->get_data()) {
    if ($filedata && $form instanceof \tool_certify\local\form\history_upload_options) {
        $result = \tool_certify\local\period::process_history_upload($data, $filedata);

        if ($result['assigned']) {
            $message = get_string('history_upload_result_assigned', 'tool_certify', $result['assigned']);
            \core\notification::add($message, \core\output\notification::NOTIFY_SUCCESS);
        }
        if ($result['periods']) {
            $message = get_string('history_upload_result_periods', 'tool_certify', $result['periods']);
            \core\notification::add($message, \core\output\notification::NOTIFY_SUCCESS);
        }
        if ($result['skipped']) {
            $message = get_string('history_upload_result_skipped', 'tool_certify', $result['skipped']);
            \core\notification::add($message, \core\output\notification::NOTIFY_INFO);
        }
        if ($result['errors']) {
            $message = get_string('history_upload_result_errors', 'tool_certify', $result['errors']);
            \core\notification::add($message, \core\output\notification::NOTIFY_WARNING);
        }

        $form->redirect_submitted($returnurl);
    }
    if (!$filedata && $form instanceof \tool_certify\local\form\history_upload_file) {
        $filedata = \tool_certify\local\util::get_uploaded_data($draftitemid);
        if ($filedata) {
            $form = new \tool_certify\local\form\history_upload_options(null, [
                'certification' => $certification, 'source' => $source,
                'context' => $context, 'csvfile' => $draftitemid, 'filedata' => $filedata]);
        }
    }
}

/** @var \tool_certify\output\management\renderer $managementoutput */
$managementoutput = $PAGE->get_renderer('tool_certify', 'management');

echo $OUTPUT->header();

echo $managementoutput->render_management_certification_tabs($certification, 'users');

echo $OUTPUT->heading(get_string('history_upload', 'tool_certify'), 3);

echo $form->render();

echo $OUTPUT->footer();