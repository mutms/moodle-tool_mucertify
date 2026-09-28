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
 * Update certification.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use tool_mucertify\local\certification;
use tool_mulib\muform\handler;
use tool_mulib\muform\util\file_area;

/** @var moodle_database $DB */
/** @var moodle_page $PAGE */
/** @var core_renderer $OUTPUT */
/** @var stdClass $CFG */
/** @var stdClass $COURSE */

require('../../../../config.php');

$id = required_param('id', PARAM_INT);

require_login();

$certification = $DB->get_record('tool_mucertify_certification', ['id' => $id], '*', MUST_EXIST);
$context = context::instance_by_id($certification->contextid);
require_capability('tool/mucertify:edit', $context);
$syscontext = context_system::instance();

$currenturl = new \core\url('/admin/tool/mucertify/management/certification_update.php', ['id' => $certification->id]);
$PAGE->set_context($context);
$PAGE->set_url($currenturl);
$title = get_string('certification_update', 'tool_mucertify');
$PAGE->set_title($title);
$PAGE->set_heading($title);

$handler = handler::from_request();

$current = (array)$certification;
$current['image'] = new file_area($syscontext, 'tool_mucertify', 'image', $certification->id);
$current['descriptionfilearea'] = new file_area($syscontext, 'tool_mucertify', 'description', $certification->id);
$form = new \tool_mucertify\local\form\certification_update($currenturl, $current);

$returnurl = new \core\url('/admin/tool/mucertify/management/certification.php', ['id' => $certification->id]);

if ($form->is_cancelled()) {
    $handler->cancelled($returnurl);
}

if ($data = $form->get_data()) {
    // Custom fields and description files are saved by the form elements.
    $record = (object)array_filter((array)$data, fn($key) => !str_starts_with($key, 'customfield_'), ARRAY_FILTER_USE_KEY);
    $record->id = $certification->id;
    unset($record->archived);
    $certification = certification::update_general($record);
    $form->get_element('description')->save_area();
    $form->get_element('customfields')->save($certification->id);
    $handler->submitted($returnurl);
}

$handler->render($form);
