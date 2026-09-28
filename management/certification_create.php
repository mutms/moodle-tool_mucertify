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
 * Create certification.
 *
 * @package    tool_mucertify
 * @copyright  2022 Open LMS (https://www.openlms.net/)
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

$contextid = required_param('contextid', PARAM_INT);
$context = context::instance_by_id($contextid);

require_login();
require_capability('tool/mucertify:edit', $context);

if ($context->contextlevel != CONTEXT_SYSTEM && $context->contextlevel != CONTEXT_COURSECAT) {
    throw new moodle_exception('invalidcontext');
}

$currenturl = new \core\url('/admin/tool/mucertify/management/certification_create.php', ['contextid' => $context->id]);
$PAGE->set_context($context);
$PAGE->set_url($currenturl);
$title = get_string('certification_create', 'tool_mucertify');
$PAGE->set_title($title);
$PAGE->set_heading($title);

$handler = handler::from_request();

$current = [
    'contextid' => $context->id,
    'descriptionformat' => FORMAT_HTML,
    'descriptionfilearea' => new file_area(context_system::instance(), 'tool_mucertify', 'description', null),
];
$form = new \tool_mucertify\local\form\certification_create($currenturl, $current);

if ($form->is_cancelled()) {
    $handler->cancelled(new \core\url('/admin/tool/mucertify/management/index.php', ['contextid' => $context->id]));
}

if ($data = $form->get_data()) {
    // Custom fields and description files are saved by the form elements.
    $record = (object)array_filter((array)$data, fn($key) => !str_starts_with($key, 'customfield_'), ARRAY_FILTER_USE_KEY);
    $record->addsources = array_fill_keys($data->addsources ?? [], 1);
    $certification = certification::create($record);
    $description = $form->get_element('description');
    $description->get_file_area()->set_itemid($certification->id);
    $description->save_area();
    $form->get_element('customfields')->save($certification->id);
    $returnurl = new \core\url('/admin/tool/mucertify/management/certification_settings.php', ['id' => $certification->id]);
    $handler->submitted($returnurl);
}

$handler->render($form);
