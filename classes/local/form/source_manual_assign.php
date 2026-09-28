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

use tool_mucertify\customfield\assignment_handler;
use tool_mucertify\local\certification;
use tool_mucertify\muform\autocomplete\source_manual_assign_cohortid;
use tool_mucertify\muform\autocompletemany\source_manual_assign_users;
use tool_mulib\muform\element\autocomplete;
use tool_mulib\muform\element\autocompletemany;
use tool_mulib\muform\element\buttons;
use tool_mulib\muform\element\cancel;
use tool_mulib\muform\element\customfields;
use tool_mulib\muform\element\datetime;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;

/**
 * assign users and cohorts manually.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class source_manual_assign extends form {
    #[\Override]
    protected function definition(): void {
        $certification = $this->get_extra_data()['certification'];
        $settings = certification::get_periods_settings($certification);

        $users = new autocompletemany('users', get_string('users'), new source_manual_assign_users((int)$certification->id));
        $users->set_required_marker(true);
        $this->add($users);

        $cohortid = new autocomplete('cohortid', get_string('cohort', 'cohort'), new source_manual_assign_cohortid((int)$certification->id));
        $cohortid->set_required_marker(true);
        $this->add($cohortid);

        $timewindowstart = new datetime('timewindowstart', get_string('windowstartdate', 'tool_mucertify'));
        $timewindowstart->set_required(true);
        $this->add($timewindowstart);

        // Other dates may depend on the due date.
        $duerequired = $settings->valid1 === certification::SINCE_WINDOWDUE
            || $settings->windowend1['since'] === certification::SINCE_WINDOWDUE
            || $settings->expiration1['since'] === certification::SINCE_WINDOWDUE;
        $timewindowdue = new datetime('timewindowdue', get_string('windowduedate', 'tool_mucertify'));
        $timewindowdue->set_required($duerequired);
        $this->add($timewindowdue);

        if ($settings->recertify) {
            $this->add(new datetime('timeuntil', get_string('untildate', 'tool_mucertify')));
        }

        $this->add(new customfields('customfields', assignment_handler::create(), null));

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('source_manual_assignusers', 'tool_mucertify')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }

    #[\Override]
    protected function validation(array $data, array &$allerrors): void {
        $certification = $this->get_extra_data()['certification'];
        $settings = certification::get_periods_settings($certification);

        if (!$data['users'] && !$data['cohortid']) {
            $allerrors['users'][] = get_string('required');
            $allerrors['cohortid'][] = get_string('required');
        }

        if ($settings->recertify && !empty($data['timeuntil'])) {
            if (
                $data['timeuntil'] - $settings->recertify <= $data['timewindowstart']
                || $data['timeuntil'] - $settings->recertify <= time()
            ) {
                $allerrors['timeuntil'][] = get_string('error');
            }
        }
    }
}
