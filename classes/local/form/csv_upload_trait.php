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

use tool_mulib\muform\element\filemanager;
use tool_mulib\muform\element\inforawhtml;
use tool_mulib\muform\element\select;

/**
 * CSV upload steps: the file with parsing options, then a preview.
 *
 * The parsed rows are stored in the user's upload area keyed by the draft item id
 * when the file step is valid, the next step reads them from there.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait csv_upload_trait {
    /**
     * Add file, delimiter and encoding elements.
     */
    protected function add_csv_file(): void {
        global $CFG;
        require_once($CFG->dirroot . '/lib/csvlib.class.php');

        $csvfile = new filemanager('csvfile', get_string('upload_csvfile', 'tool_mucertify'), 1);
        $csvfile->set_required(true);
        $this->add($csvfile);

        $choices = \csv_import_reader::get_delimiter_list();
        $delimiter = new select('delimiter_name', get_string('csvdelimiter', 'tool_uploaduser'), $choices);
        if (array_key_exists('cfg', $choices)) {
            $delimiter->set_default('cfg');
        } else if (get_string('listsep', 'langconfig') === ';') {
            $delimiter->set_default('semicolon');
        } else {
            $delimiter->set_default('comma');
        }
        $this->add($delimiter);

        $encoding = new select('encoding', get_string('encoding', 'tool_uploaduser'), \core_text::get_encodings());
        $encoding->set_default('UTF-8');
        $this->add($encoding);
    }

    /**
     * Parse the uploaded file and store the rows for the next step.
     *
     * @param array $data
     * @param array $allerrors
     */
    protected function validate_csv_file(array $data, array &$allerrors): void {
        global $CFG;
        require_once($CFG->dirroot . '/lib/csvlib.class.php');

        $files = $this->get_element('csvfile')->get_files();
        if (!$files) {
            return;
        }
        $file = reset($files);
        $content = trim($file->get_content());
        if ($content === '') {
            $allerrors['csvfile'][] = get_string('error');
            return;
        }

        $iid = \csv_import_reader::get_new_iid('certifyupload');
        $cir = new \csv_import_reader($iid, 'certifyupload');
        $readcount = $cir->load_csv_content($content, $data['encoding'], $data['delimiter_name']);
        $columns = $cir->get_columns();
        $csvloaderror = $cir->get_error();
        unset($content);

        if ($csvloaderror !== null) {
            $allerrors['csvfile'][] = $csvloaderror;
            $cir->cleanup(true);
            return;
        }
        if (!$readcount || !$columns) {
            $allerrors['csvfile'][] = get_string('error');
            $cir->cleanup(true);
            return;
        }

        $filedata = [array_map('trim', $columns)];
        $cir->init();
        while ($line = $cir->next()) {
            $filedata[] = array_map('trim', $line);
        }
        $cir->close();
        $cir->cleanup(true);

        \tool_mucertify\local\util::store_uploaded_data((int)$data['csvfile'], $filedata);
    }

    /**
     * Add preview of the first rows.
     *
     * @param array $filedata
     */
    protected function add_csv_preview(array $filedata): void {
        $preview = new \html_table();
        $preview->data = [];
        foreach (array_values($filedata) as $i => $row) {
            if ($i >= 5) {
                $preview->data[] = array_fill(0, count($row), '...');
                break;
            }
            $preview->data[] = array_map('s', $row);
        }
        $this->add(new inforawhtml('preview', get_string('preview'), \html_writer::table($preview)));
    }
}
