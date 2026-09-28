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

use tool_mulib\muform\element\autocompletemany;
use tool_mulib\muform\element\buttons;
use tool_mulib\muform\element\cancel;
use tool_mulib\muform\element\select;
use tool_mulib\muform\element\submit;
use tool_mulib\muform\form;
use tool_mucertify\local\source\cohort;
use tool_mucertify\muform\autocompletemany\source_cohort_edit_cohortids;

/**
 * Edit cohort assignment settings.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class source_cohort_edit extends form {
    #[\Override]
    protected function definition(): void {
        $source = $this->get_extra_data()['source'];
        $yesno = ['1' => get_string('yes'), '0' => get_string('no')];

        $enable = new select('enable', get_string('active'), $yesno);
        $enable->set_frozen($source->hasassignments);
        $this->add($enable);

        $certificationid = (int)$this->get_extra_data()['certification']->id;
        $cohortids = new autocompletemany(
            'cohortids',
            get_string('source_cohort_cohortstoassign', 'tool_mucertify'),
            new source_cohort_edit_cohortids($certificationid)
        );
        if (!empty($source->id)) {
            $cohortids->set_default(array_map('strval', array_keys(cohort::fetch_assignment_cohorts_menu($source->id))));
        }
        $this->add($cohortids);
        $this->get_display_manager()->hide_if('cohortids', 'enable', 'eq', '0');

        $this->add(new buttons('buttons'));
        $this->add(new submit('submit', get_string('update')), 'buttons');
        $this->add(new cancel(), 'buttons');
    }
}
