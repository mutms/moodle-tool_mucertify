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

namespace tool_mucertify\mureport\system_report;

use tool_mureport\mureport\system_report;
use tool_mucertify\mureport\entity\period;
use tool_mulib\local\sql;
use core\exception\invalid_parameter_exception;

/**
 * Certification periods of one assignment, for the assigned user and user managers.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class user_assignment_periods extends system_report {
    /**
     * Make report instance.
     *
     * @param int $assignmentid
     * @return self
     */
    public static function make_instance(int $assignmentid): self {
        return self::from_constraints(['assignmentid' => $assignmentid]);
    }

    #[\Override]
    public static function get_title(): string {
        return get_string('periods', 'tool_mucertify');
    }

    #[\Override]
    public static function is_available(): bool {
        return \tool_mulib\local\mulib::is_mucertify_available();
    }

    #[\Override]
    public function get_context(): \core\context {
        $assignment = $this->get_constraint_record('tool_mucertify_assignment', 'assignmentid');
        if (!$assignment || $assignment->archived) {
            throw new invalid_parameter_exception('Invalid assignment');
        }
        $certification = $this->get_cached_record('tool_mucertify_certification', (int)$assignment->certificationid);
        if ($certification->archived) {
            throw new invalid_parameter_exception('Invalid assignment');
        }
        return \core\context\user::instance($assignment->userid);
    }

    #[\Override]
    protected function check_access(): void {
        global $USER;
        if ($this->get_context()->instanceid != $USER->id) {
            $this->require_capability('tool/mucertify:viewusercertifications');
        }
    }

    #[\Override]
    protected function define(): void {
        $this->set_main_entity(new period('period'));
        $this->set_row_muted('period.timerevoked IS NOT NULL', ['period']);
        $this->set_default_columns([
            'period:timewindowstart',
            'period:timewindowdue',
            'period:timewindowend',
            'period:program',
            'period:timefrom',
            'period:timeuntil',
            'period:recertify',
            'period:status',
        ]);
        $this->set_default_filters([]);
        $this->set_export_allowed(false);
        $this->set_default_sorting(['period:timewindowstart' => 'asc']);
    }

    #[\Override]
    protected function apply_constraints(): void {
        $assignment = $this->get_constraint_record('tool_mucertify_assignment', 'assignmentid');
        $this->add_restriction(new sql(
            'period.userid = :periodsuserid AND period.certificationid = :periodscertificationid',
            ['periodsuserid' => $assignment->userid ?? 0, 'periodscertificationid' => $assignment->certificationid ?? 0]
        ), ['period']);
    }

    #[\Override]
    protected function define_columns(string $selector): array {
        $columns = parent::define_columns($selector);
        if ($selector === 'period:program') {
            $columns['period:program']->set_default_formatter('allocated');
        }
        if ($selector === 'period:recertify') {
            $columns['period:recertify']->set_allowed(fn(): bool => $this->is_recertifying());
        }
        return $columns;
    }

    /**
     * Does the certification of the assignment recertify automatically?
     *
     * @return bool
     */
    private function is_recertifying(): bool {
        $assignment = $this->get_constraint_record('tool_mucertify_assignment', 'assignmentid');
        if (!$assignment) {
            return false;
        }
        return (bool)$this->get_cached_record('tool_mucertify_certification', (int)$assignment->certificationid)->recertify;
    }
}
