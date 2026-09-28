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

namespace tool_mucertify\muform\autocompletemany;

use tool_mulib\muform\util\autocomplete\cohort_trait;

/**
 * Cohorts of the cohort assignment source.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class source_cohort_edit_cohortids extends \tool_mulib\muform\autocompletemany\base {
    use cohort_trait;

    /** @var \context certification context */
    private \context $context;

    /**
     * Constructor.
     *
     * @param int $certificationid
     */
    public function __construct(
        /** @var int certification id */
        private readonly int $certificationid
    ) {
        global $DB;
        $certification = $DB->get_record('tool_mucertify_certification', ['id' => $certificationid], '*', MUST_EXIST);
        $this->context = \context::instance_by_id($certification->contextid);
        require_capability('tool/mucertify:edit', $this->context);
    }

    #[\Override]
    public function get_args(): array {
        return [$this->certificationid];
    }

    #[\Override]
    public function search(string $query, int $maxitems, array $exclude): ?array {
        return $this->search_cohorts($this->context, $query, $maxitems, $exclude);
    }

    #[\Override]
    public function labels(array $values): array {
        return $this->cohort_labels($this->context, $values, $this->get_current());
    }

    #[\Override]
    public function validate(array $values): array {
        return $this->validate_cohorts($this->context, $values, $this->get_current());
    }

    /**
     * Cohorts already used.
     *
     * @return int[]
     */
    private function get_current(): array {
        global $DB;
        $source = $DB->get_record('tool_mucertify_source', ['certificationid' => $this->certificationid, 'type' => 'cohort']);
        if (!$source) {
            return [];
        }
        return array_map('intval', $DB->get_fieldset('tool_mucertify_src_cohort', 'cohortid', ['sourceid' => $source->id]));
    }
}
