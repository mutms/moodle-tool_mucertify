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

namespace tool_mucertify\muform\autocomplete;

use tool_mulib\local\context_map;
use tool_mulib\local\mulib;
use tool_mulib\local\sql;

/**
 * Program of certification periods: programs with the certification source
 * that the user may add to certifications.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification_periods_programid extends \tool_mulib\muform\autocomplete\base {
    /** @var \stdClass certification record */
    private \stdClass $certification;
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
        $this->certification = $DB->get_record('tool_mucertify_certification', ['id' => $certificationid], '*', MUST_EXIST);
        $this->context = \context::instance_by_id($this->certification->contextid);
        require_capability('tool/mucertify:edit', $this->context);
    }

    #[\Override]
    public function get_args(): array {
        return [$this->certificationid];
    }

    #[\Override]
    public function search(string $query, int $maxitems): ?array {
        global $DB, $USER;

        $sql = (
            new sql("
                SELECT p.id, p.fullname
                  FROM {tool_muprog_program} p
                  JOIN {tool_muprog_source} s ON s.programid = p.id and s.type = 'mucertify'
                  /* capsubquery */
                  /* tenantjoin */
                 WHERE p.archived = 0 AND p.draft = 0 /* searchsql */
              ORDER BY p.fullname ASC, p.id ASC")
        )
            ->replace_comment(
                'searchsql',
                \tool_muprog\local\management::get_program_search_query(null, trim($query), 'p')->wrap('AND ', '')
            )
            ->replace_comment(
                'capsubquery',
                context_map::get_contexts_by_capability_query(
                    'tool/muprog:addtocertifications',
                    $USER->id,
                    new sql("(ctx.contextlevel = ? OR ctx.contextlevel = ?)", [\context_system::LEVEL, \context_coursecat::LEVEL])
                )->wrap("JOIN (", ")capctx ON capctx.id = p.contextid")
            );

        if (mulib::is_mutenancy_active() && $this->context->tenantid) {
            $sql = $sql->replace_comment(
                'tenantjoin',
                new sql(
                    "JOIN {context} tctx ON tctx.id = p.contextid AND (tctx.tenantid = ? OR tctx.tenantid IS NULL)",
                    [$this->context->tenantid]
                )
            );
        }

        $programs = $DB->get_records_sql_menu($sql->sql, $sql->params, 0, $maxitems + 1);
        if (count($programs) > $maxitems) {
            return null;
        }
        return array_map(fn($name) => format_string($name, true, ['context' => $this->context]), $programs);
    }

    #[\Override]
    public function label(string $value): ?string {
        global $DB;
        if (!preg_match('/^[1-9][0-9]*$/D', $value)) {
            return null;
        }
        $program = $DB->get_record('tool_muprog_program', ['id' => (int)$value]);
        if (!$program || !$this->is_allowed($program)) {
            return null;
        }
        return format_string($program->fullname, true, ['context' => $this->context]);
    }

    /**
     * May the program be selected?
     *
     * @param \stdClass $program
     * @return bool
     */
    private function is_allowed(\stdClass $program): bool {
        global $DB;
        if ($program->id == $this->certification->programid1 || $program->id == $this->certification->programid2) {
            // Current value is always ok.
            return true;
        }
        if ($program->archived || $program->draft) {
            return false;
        }
        if (!$DB->record_exists('tool_muprog_source', ['programid' => $program->id, 'type' => 'mucertify'])) {
            return false;
        }
        $programcontext = \context::instance_by_id($program->contextid);
        if (!has_capability('tool/muprog:addtocertifications', $programcontext)) {
            return false;
        }
        if (mulib::is_mutenancy_active()) {
            if ($programcontext->tenantid && $this->context->tenantid && $programcontext->tenantid != $this->context->tenantid) {
                return false;
            }
        }
        return true;
    }
}
