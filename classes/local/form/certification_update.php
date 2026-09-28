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
use tool_mulib\muform\element\customfields;
use tool_mulib\muform\element\editor;
use tool_mulib\muform\element\filemanager;
use tool_mulib\muform\element\select;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\element\tags;
use tool_mulib\muform\element\text;
use tool_mulib\muform\form;
use tool_mucertify\customfield\certification_handler;
use tool_mucertify\muform\tagarea\certification as certification_tagarea;

/**
 * Update certification.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification_update extends form {
    #[\Override]
    protected function definition(): void {
        $current = $this->get_current_data();
        $contextid = (int)$current['contextid'];
        $certificationid = (int)$current['id'];

        $fullname = new text('fullname', get_string('certificationname', 'tool_mucertify'), ['maxlength' => 254]);
        $fullname->set_required(true);
        $this->add($fullname);

        $idnumber = new text('idnumber', get_string('certificationidnumber', 'tool_mucertify'), ['type' => 'rawtext', 'maxlength' => 254]);
        $idnumber->set_required(true);
        $this->add($idnumber);

        $this->add(new tags('tags', get_string('tags'), new certification_tagarea($certificationid, $contextid)));

        $this->add(new filemanager('image', get_string('certificationimage', 'tool_mucertify'), 1, ['.jpg', '.jpeg', '.jpe', '.png']));

        $this->add(new editor('description', get_string('description'), -1));

        $archived = new select('archived', get_string('archived', 'tool_mucertify'), [0 => get_string('no'), 1 => get_string('yes')]);
        $archived->set_frozen(true);
        $this->add($archived);

        $this->add(new customfields('customfields', certification_handler::create(), $certificationid));

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('certification_update', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        $this->validate_idnumber($data, $allerrors, (int)$this->get_current_data()['id']);
    }

    /**
     * Idnumbers are unique and have no surrounding whitespace.
     *
     * @param array $data
     * @param array $allerrors
     * @param int $id current certification id, 0 for new
     */
    private function validate_idnumber(array $data, array &$allerrors, int $id): void {
        global $DB;
        $select = "LOWER(idnumber) = LOWER(?) AND id <> ?";
        if (trim($data['idnumber']) !== $data['idnumber']) {
            $allerrors['idnumber'][] = get_string('error');
        } else if ($DB->record_exists_select('tool_mucertify_certification', $select, [$data['idnumber'], $id])) {
            $allerrors['idnumber'][] = get_string('error');
        }
    }
}
