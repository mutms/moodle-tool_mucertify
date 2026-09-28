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
use tool_mulib\muform\element\checkbox;
use tool_mulib\muform\element\select;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;

/**
 * Assign users via file upload.
 *
 * @package    tool_mucertify
 * @copyright  2022 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class source_manual_upload_options extends form {
    use csv_upload_trait;

    #[\Override]
    protected function definition(): void {
        $filedata = $this->get_extra_data()['filedata'];
        $this->add_csv_preview($filedata);

        $fileoptions = array_map('strval', reset($filedata));
        $this->add(new select('usercolumn', get_string('source_manual_usercolumn', 'tool_mucertify'), $fileoptions));

        $mappings = [
            'username' => get_string('username'),
            'idnumber' => get_string('idnumber'),
            'email' => get_string('email'),
        ];
        $usermapping = new select('usermapping', get_string('source_manual_usermapping', 'tool_mucertify'), $mappings);
        $firstcolumn = reset($fileoptions);
        if (isset($mappings[$firstcolumn])) {
            $usermapping->set_default($firstcolumn);
        }
        $this->add($usermapping);

        $hasheaders = new checkbox('hasheaders', get_string('source_manual_hasheaders', 'tool_mucertify'));
        $hasheaders->set_default(isset($mappings[$firstcolumn]) ? 1 : 0);
        $this->add($hasheaders);

        $options = [-1 => get_string('choose')] + $fileoptions;
        foreach (['timestartcolumn', 'timeduecolumn', 'timeendcolumn', 'timeuntilcolumn', 'timecertifiedtempcolumn'] as $name) {
            $column = new select($name, get_string('source_manual_' . $name, 'tool_mucertify'), $options);
            $column->set_default(-1);
            $this->add($column);
        }

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('source_manual_uploadusers', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        $usedfields = [];
        $columns = ['usercolumn', 'timestartcolumn', 'timeduecolumn', 'timeendcolumn', 'timeuntilcolumn', 'timecertifiedtempcolumn'];
        foreach ($columns as $column) {
            if ((string)$data[$column] !== '-1' && in_array((string)$data[$column], $usedfields, true)) {
                $allerrors[$column][] = get_string('columnusedalready', 'tool_mucertify');
            } else {
                $usedfields[] = (string)$data[$column];
            }
        }
    }
}
