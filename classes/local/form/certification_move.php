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

use tool_mulib\muform\element\autocomplete;
use tool_mulib\muform\element\buttons;
use tool_mulib\muform\element\cancel;
use tool_mulib\muform\element\info;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;
use tool_mucertify\muform\autocomplete\certification_contextid;

/**
 * Move certification to a different context.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification_move extends form {
    #[\Override]
    protected function definition(): void {
        $certification = $this->get_current_data();

        $this->add(new info('fullname', get_string('certificationname', 'tool_mucertify')));

        $this->add(new info('idnumber', get_string('certificationidnumber', 'tool_mucertify'), null, info::PLAIN));

        $source = new certification_contextid((int)$certification['contextid']);
        $contextid = new autocomplete('contextid', get_string('category'), $source);
        $contextid->set_required(true);
        $this->add($contextid);

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('certification_move', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }
}
