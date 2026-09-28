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
use tool_mulib\muform\element\customfields;
use tool_mulib\muform\element\datetime;
use tool_mulib\muform\element\info;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;
use tool_mucertify\customfield\assignment_handler;

/**
 * Update user assignment.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class assignment_update extends form {
    #[\Override]
    protected function definition(): void {
        $extra = $this->get_extra_data();

        $this->add(new info('userfullname', get_string('user')));

        if ($extra['certification']->recertify !== null) {
            $this->add(new checkbox('stoprecertify', get_string('stoprecertify', 'tool_mucertify')));
        }

        $this->add(new datetime('timecertifiedtemp', get_string('certifieduntiltemporary', 'tool_mucertify')));

        $this->add(new customfields('customfields', assignment_handler::create(), (int)$extra['assignment']->id));

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('assignment_update', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }
}
