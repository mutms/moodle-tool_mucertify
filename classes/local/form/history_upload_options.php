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
use tool_mulib\muform\element\textarea;
use tool_mulib\muform\form;

/**
 * Assign users via file upload.
 *
 * @package    tool_mucertify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @author     Farhan Karmali
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class history_upload_options extends form {
    use csv_upload_trait;

    #[\Override]
    protected function definition(): void {
        $extra = $this->get_extra_data();
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

        if ($extra['source'] && has_capability('tool/mucertify:assign', $extra['context'])) {
            $this->add(new checkbox('assign', get_string('history_upload_assign', 'tool_mucertify')));
            $this->add(new checkbox('skipassigned', get_string('history_upload_skipassigned', 'tool_mucertify')));
            $this->get_display_manager()->hide_if('skipassigned', 'assign', 'notchecked');
        }

        $options = ['' => get_string('choosedots')] + $fileoptions;
        $defaults = [
            'timefromcolumn' => ['from'],
            'timeuntilcolumn' => ['expiration'],
            'timecertifiedcolumn' => ['certified', 'from'],
            'evidencecolumn' => ['evidence'],
        ];
        foreach ($defaults as $name => $headers) {
            $column = new select($name, get_string('history_upload_' . $name, 'tool_mucertify'), $options);
            $column->set_required($name !== 'evidencecolumn');
            foreach ($headers as $header) {
                $index = array_search($header, $fileoptions, true);
                if ($index !== false) {
                    $column->set_default((string)$index);
                    break;
                }
            }
            $this->add($column);
        }

        $evidencedefault = new textarea('evidencedefault', get_string('evidence_default', 'tool_mucertify'));
        $evidencedefault->set_required(true);
        $evidencedefault->set_default(get_string('evidence_default_text', 'tool_mucertify'));
        $this->add($evidencedefault);

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('history_upload', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        foreach (['timefromcolumn', 'timeuntilcolumn', 'timecertifiedcolumn'] as $column) {
            if ($data[$column] !== null && $data[$column] === $data['usercolumn']) {
                $allerrors[$column][] = get_string('columnusedalready', 'tool_mucertify');
            }
        }
        if ($data['timefromcolumn'] !== null && $data['timefromcolumn'] === $data['timeuntilcolumn']) {
            $allerrors['timeuntilcolumn'][] = get_string('columnusedalready', 'tool_mucertify');
        }
        if ($data['timecertifiedcolumn'] !== null && $data['timecertifiedcolumn'] === $data['timeuntilcolumn']) {
            $allerrors['timeuntilcolumn'][] = get_string('columnusedalready', 'tool_mucertify');
        }
    }
}
