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

namespace tool_mucertify\local\form;

use tool_mucertify\local\history_upload;
use tool_mulib\muform\element\buttons;
use tool_mulib\muform\element\cancel;
use tool_mulib\muform\element\checkbox;
use tool_mulib\muform\element\info;
use tool_mulib\muform\element\inforawhtml;
use tool_mulib\muform\element\reload;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\element\textarea;
use tool_mulib\muform\form;

/**
 * Certification history upload, stage three: options and the dry run result.
 *
 * @package    tool_mucertify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @copyright  2026 Petr Skoda
 * @author     Farhan Karmali
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class history_upload_options extends form {
    #[\Override]
    protected function definition(): void {
        $extra = $this->get_extra_data();
        $certification = $extra['certification'];
        $source = $extra['source'];
        $csvdata = $extra['csvdata'];

        if ($source) {
            $this->add(new checkbox('assign', get_string('history_upload_assign', 'tool_mucertify')));
            $this->add(new checkbox('skipassigned', get_string('history_upload_skipassigned', 'tool_mucertify')));
            $this->get_display_manager()->hide_if('skipassigned', 'assign', 'notchecked');
        }

        $evidencedefault = new textarea('evidencedefault', get_string('evidence_default', 'tool_mucertify'), ['rows' => 3]);
        $evidencedefault->set_required(true);
        $evidencedefault->set_default(get_string('evidence_default_text', 'tool_mucertify'));
        $this->add($evidencedefault);

        $this->add(new info('skipinfo', '', get_string('history_upload_skip_info', 'tool_mucertify')));
        foreach (history_upload::get_skip_menu() as $name => $label) {
            $skip = (new checkbox($name, $label))
                ->set_default(1);
            $this->add($skip);
        }

        // The preview always shows what the options in the form would do right now.
        $options = (object)[];
        foreach (history_upload::get_option_names() as $name) {
            $element = $this->get_element($name);
            $options->$name = $element ? (int)$element->get_value() : 0;
        }
        $options->evidencedefault = (string)$this->get_element('evidencedefault')->get_value();
        $outcomes = history_upload::check($certification, $source, $csvdata, $options);

        $this->add(new inforawhtml('preview', '', $this->render_preview($outcomes)));

        // The upload button comes first so that Enter never skips the dry run of other options.
        $this->add(new buttons('buttons'));
        if (self::is_importable($outcomes)) {
            $this->add(new submit('submit', get_string('history_upload', 'tool_mucertify')), 'buttons');
        }
        $this->add(new reload('refresh', get_string('history_upload_refresh', 'tool_mucertify')), 'buttons');
        $this->add(new reload('back', get_string('muform_back', 'tool_mulib')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    /**
     * May the upload run with the outcomes of the dry run?
     *
     * @param array $outcomes
     * @return bool
     */
    private static function is_importable(array $outcomes): bool {
        $imported = 0;
        foreach ($outcomes as $outcome) {
            if ($outcome->result === history_upload::RESULT_ERROR) {
                return false;
            }
            if ($outcome->result === history_upload::RESULT_IMPORTED) {
                $imported++;
            }
        }
        return (bool)$imported;
    }

    /**
     * Counts of the dry run and the first rows of its result.
     *
     * @param array $outcomes
     * @return string html
     */
    private function render_preview(array $outcomes): string {
        global $OUTPUT;

        $counts = [
            history_upload::RESULT_IMPORTED => 0,
            history_upload::RESULT_SKIPPED => 0,
            history_upload::RESULT_ERROR => 0,
        ];
        foreach ($outcomes as $outcome) {
            $counts[$outcome->result]++;
        }

        $message = get_string('history_upload_counts', 'tool_mucertify', (object)$counts);
        $style = $counts[history_upload::RESULT_ERROR] ? 'error' : 'info';
        $html = $OUTPUT->notification($message, $style, false);

        $labels = [
            history_upload::RESULT_IMPORTED => get_string('history_upload_result_imported', 'tool_mucertify'),
            history_upload::RESULT_SKIPPED => get_string('history_upload_result_skipped', 'tool_mucertify'),
            history_upload::RESULT_ERROR => get_string('history_upload_result_error', 'tool_mucertify'),
        ];
        $table = new \html_table();
        $table->attributes['class'] = 'generaltable mb-0';
        $table->head = [
            get_string('user'),
            get_string('status'),
            get_string('description'),
        ];

        // Problems come first, long uploads are not read row by row, the counts above say the rest.
        $ready = fn($outcome) => $outcome->result === history_upload::RESULT_IMPORTED;
        usort($outcomes, fn($a, $b) => $ready($a) <=> $ready($b));
        $shown = array_slice($outcomes, 0, history_upload::PREVIEW_ROWS);
        foreach ($shown as $outcome) {
            $class = $outcome->result === history_upload::RESULT_ERROR ? 'text-danger' : '';
            $table->data[] = [
                s($outcome->identifier),
                \core\output\html_writer::span($labels[$outcome->result], $class),
                s($outcome->message),
            ];
        }
        $html .= \core\output\html_writer::table($table);
        if (count($outcomes) > count($shown)) {
            $more = count($outcomes) - count($shown);
            $html .= \core\output\html_writer::div(
                get_string('history_upload_more_rows', 'tool_mucertify', $more),
                'text-muted'
            );
        }

        return $html;
    }
}
