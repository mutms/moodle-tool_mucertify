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
use tool_mucertify\mureport\entity\certification;
use core\exception\invalid_parameter_exception;
use core\lang_string;

/**
 * Certifications in a category and its subcategories, or all certifications, for certification managers.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certifications extends system_report {
    /**
     * Make report instance.
     *
     * @param int $contextid system or category context
     * @return self
     */
    public static function make_instance(int $contextid): self {
        return self::from_constraints(['contextid' => $contextid]);
    }

    #[\Override]
    public static function get_title(): string {
        return get_string('certifications', 'tool_mucertify');
    }

    #[\Override]
    public function get_context(): \core\context {
        $context = $this->get_constraint_context();
        if (!$context || !in_array((int)$context->contextlevel, [CONTEXT_SYSTEM, CONTEXT_COURSECAT], true)) {
            throw new invalid_parameter_exception('Invalid certification context');
        }
        return $context;
    }

    #[\Override]
    protected function check_access(): void {
        $this->require_capability('tool/mucertify:view');
    }

    #[\Override]
    protected function define(): void {
        $this->set_main_entity((new certification('certification'))->set_customfields_managed());
        $this->set_row_muted('certification.archived = 1', ['certification']);
        $this->add_capability_restriction('certification', 'tool/mucertify:view');

        $this->set_default_columns([
            'certification:fullname',
            'certification:idnumber',
            'certification:category',
            'certification:assignmentcount',
            'certification:archived',
        ]);
        $this->set_default_filters([
            'certification:fullname' => ['multisearch' => true],
            'certification:idnumber' => ['multisearch' => true],
            'certification:id' => ['multisearch' => true],
            'certification:category',
            'certification:archived',
            'certification:timecreated',
            'certification:allcustomfields',
        ]);
        $this->set_preset_filters(['certification:archived' => ['value' => 0]]);
        $this->set_multisearch_label(new lang_string('certificationsearch', 'tool_mucertify'));
        $this->set_default_sorting(['certification:fullname' => 'asc']);
    }

    #[\Override]
    protected function apply_constraints(): void {
        $context = $this->get_context();
        if ($context->contextlevel != CONTEXT_SYSTEM) {
            $this->add_context_restriction('certification', $context);
        }
    }
}
