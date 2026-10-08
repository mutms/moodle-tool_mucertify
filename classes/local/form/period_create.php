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
use tool_mulib\muform\element\datetime;
use tool_mulib\muform\element\info;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;
use tool_mucertify\muform\autocomplete\certification_periods_programid;

/**
 * Edit user period.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class period_create extends form {
    #[\Override]
    protected function definition(): void {
        $certificationid = (int)$this->get_extra_data()['certificationid'];

        $this->add(new info('userfullname', get_string('user')));

        $programid = new autocomplete('programid', get_string('program', 'tool_muprog'), new certification_periods_programid($certificationid));
        $programid->set_required(true);
        $this->add($programid);

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

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('period_create', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        global $DB;

        $extra = $this->get_extra_data();
        $certification = $DB->get_record('tool_mucertify_certification', ['id' => $extra['certificationid']], '*', MUST_EXIST);
        if (\tool_mucertify\local\period::is_program_reuse_blocked($certification, (int)$extra['userid'], (int)$data['programid'])) {
            $allerrors['programid'][] = get_string('error_programreuse', 'tool_mucertify');
        }

        if ($data['timewindowdue'] && $data['timewindowdue'] <= $data['timewindowstart']) {
            $allerrors['timewindowdue'][] = get_string('error');
        }
        if ($data['timewindowend'] && $data['timewindowend'] <= $data['timewindowstart']) {
            $allerrors['timewindowend'][] = get_string('error');
        }
        if ($data['timewindowdue'] && $data['timewindowend'] && $data['timewindowend'] < $data['timewindowdue']) {
            $allerrors['timewindowend'][] = get_string('error');
        }
        if ($data['timefrom'] && $data['timeuntil'] && $data['timefrom'] >= $data['timeuntil']) {
            $allerrors['timeuntil'][] = get_string('error');
        }
    }
}
