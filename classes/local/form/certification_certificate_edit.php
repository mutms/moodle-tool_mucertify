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

namespace tool_mucertify\local\form;

use tool_mulib\muform\element\buttons;
use tool_mulib\muform\element\cancel;
use tool_mulib\muform\element\inforawhtml;
use tool_mulib\muform\element\select;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;

/**
 * Edit certification certificate settings.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification_certificate_edit extends form {
    #[\Override]
    protected function definition(): void {
        global $OUTPUT;

        $current = $this->get_current_data();
        $context = $this->get_extra_data()['context'];

        $templates = self::get_templates($context, $current['templateid'] ? (int)$current['templateid'] : null);
        $templateoptions = ['0' => get_string('notset', 'tool_mucertify')] + $templates;
        $this->add(new select('templateid', get_string('certificatetemplate', 'tool_certificate'), $templateoptions));

        if (\tool_certificate\permission::can_manage_anywhere()) {
            // Opens in a new window, the form must not be lost.
            $manage = get_string('managetemplates', 'tool_certificate');
            $link = \html_writer::link(
                new \core\url('/admin/tool/certificate/manage_templates.php'),
                $OUTPUT->pix_icon('i/settings', $manage) . ' ' . $manage,
                ['target' => '_blank', 'class' => 'small']
            );
            $this->add(new inforawhtml('managetemplates', '', $link));
        }

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('updatecertificatetemplate', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    /**
     * Get templates.
     *
     * @param \context $context
     * @param int|null $templateid
     * @return array
     */
    public static function get_templates(\context $context, ?int $templateid): array {
        global $DB;

        $templates = [];
        if (!empty($records = \tool_certificate\permission::get_visible_templates($context))) {
            foreach ($records as $record) {
                $templates[$record->id] = format_string($record->name);
            }
        }
        if ($templateid && !isset($templates[$templateid])) {
            $record = $DB->get_record('tool_certificate_templates', ['id' => $templateid]);
            if ($record) {
                $templates[$record->id] = format_string($record->name);
            } else {
                $templates[$templateid] = get_string('error');
            }
        }

        asort($templates);
        return $templates;
    }
}
