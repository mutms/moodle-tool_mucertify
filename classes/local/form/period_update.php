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
use tool_mulib\muform\element\datetime;
use tool_mulib\muform\element\info;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\element\textarea;
use tool_mulib\muform\form;

/**
 * Edit user period.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class period_update extends form {
    #[\Override]
    protected function definition(): void {
        $this->add(new info('programname', get_string('program', 'tool_muprog')));

        $this->add(new info('userfullname', get_string('user')));

        $timewindowstart = new datetime('timewindowstart', get_string('windowstartdate', 'tool_mucertify'));
        $timewindowstart->set_required(true);
        $this->add($timewindowstart);

        $timewindowdue = new datetime('timewindowdue', get_string('windowduedate', 'tool_mucertify'));
        $this->add($timewindowdue);

        $timewindowend = new datetime('timewindowend', get_string('windowenddate', 'tool_mucertify'));
        $this->add($timewindowend);

        $timefrom = new datetime('timefrom', get_string('fromdate', 'tool_mucertify'));
        $this->add($timefrom);

        $timeuntil = new datetime('timeuntil', get_string('untildate', 'tool_mucertify'));
        $this->add($timeuntil);

        $timecertified = new datetime('timecertified', get_string('certifieddate', 'tool_mucertify'));
        $this->add($timecertified);

        $timerevoked = new datetime('timerevoked', get_string('revokeddate', 'tool_mucertify'));
        $this->add($timerevoked);

        $evidencedetails = new textarea('evidencedetails', get_string('evidence_details', 'tool_mucertify'));
        $evidencedetails->add_help_button('evidence_details', 'tool_mucertify');
        $this->add($evidencedetails);

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('period_update', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        if ($data['timewindowdue'] && $data['timewindowdue'] <= $data['timewindowstart']) {
            $allerrors['timewindowdue'][] = get_string('error');
        }
        if ($data['timewindowend'] && $data['timewindowend'] <= $data['timewindowstart']) {
            $allerrors['timewindowend'][] = get_string('error');
        }
        if ($data['timewindowdue'] && $data['timewindowend'] && $data['timewindowend'] < $data['timewindowdue']) {
            $allerrors['timewindowend'][] = get_string('error');
        }
        if ($data['timecertified'] && !$data['timefrom']) {
            $allerrors['timefrom'][] = get_string('required');
        }
        if ($data['timefrom'] && $data['timeuntil'] && $data['timefrom'] >= $data['timeuntil']) {
            $allerrors['timeuntil'][] = get_string('error');
        }
    }
}
