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
use tool_mulib\muform\element\duration;
use tool_mulib\muform\element\select;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;
use tool_mucertify\local\certification;
use tool_mucertify\muform\autocomplete\certification_periods_programid;

/**
 * Edit initial certification settings.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification_settings_edit1 extends form {
    use delay_trait;

    #[\Override]
    protected function definition(): void {
        $certificationid = (int)$this->get_current_data()['id'];

        $programid = new autocomplete('programid1', get_string('program', 'tool_muprog'), new certification_periods_programid($certificationid));
        $programid->set_required(true);
        $this->add($programid);

        $this->add(new select('resettype1', get_string('resettype1', 'tool_mucertify'), array_map('strval', certification::get_resettype_options())));

        $due = new duration('due1', get_string('windowdueafter', 'tool_mucertify'), ['d', 'h']);
        $this->add($due);

        $this->add(new select('valid1', get_string('validfrom', 'tool_mucertify'), array_map('strval', certification::get_valid_options())));

        $this->add_delay('windowend1', get_string('windowendafter', 'tool_mucertify'), array_map('strval', certification::get_windowend_options()));

        $this->add_delay('expiration1', get_string('expirationafter', 'tool_mucertify'), array_map('strval', certification::get_expiration_options()));

        $recertify = new duration('recertify', get_string('recertifybefore', 'tool_mucertify'), ['d', 'h']);
        $this->add($recertify);

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('certification_update', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        $this->validate_delay($data, 'windowend1', $allerrors);
        $this->validate_delay($data, 'expiration1', $allerrors);
    }
}
