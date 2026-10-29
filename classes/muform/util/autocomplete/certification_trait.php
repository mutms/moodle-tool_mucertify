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

namespace tool_mucertify\muform\util\autocomplete;

use core\context;
use tool_mulib\local\context_map;
use tool_mulib\local\mulib;
use tool_mulib\local\sql;

/**
 * Certification search helpers for autocomplete sources of either family.
 *
 * Certifications are offered when the user has a capability in the certification context,
 * extra conditions may use table aliases "c" (certification) and "cctx" (certification context).
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait certification_trait {
    /**
     * Search certifications.
     *
     * @param string $capability required in the certification context
     * @param string $query
     * @param int $maxitems
     * @param string[] $exclude certification ids not to return
     * @param sql|null $where extra condition on table aliases "c" and "cctx"
     * @return array|null [id => label html], null when more than $maxitems match
     */
    protected function search_certifications(
        string $capability,
        string $query,
        int $maxitems,
        array $exclude = [],
        ?sql $where = null
    ): ?array {
        global $DB, $USER;

        $sql = (new sql(
            "SELECT c.id, c.fullname, c.contextid
               FROM {tool_mucertify_certification} c
               JOIN {context} cctx ON cctx.id = c.contextid
               /* capsubquery */
              WHERE 1=1 /* exclude */ /* where */ /* searchsql */
           ORDER BY c.fullname ASC, c.id ASC"
        ))
            ->replace_comment(
                'capsubquery',
                context_map::get_contexts_by_capability_query(
                    $capability,
                    $USER->id,
                    new sql("(ctx.contextlevel = ? OR ctx.contextlevel = ?)", [CONTEXT_SYSTEM, CONTEXT_COURSECAT])
                )->wrap("JOIN (", ")capctx ON capctx.id = c.contextid")
            )
            ->replace_comment(
                'searchsql',
                \tool_mulib\local\search_util::get_search_query(trim($query), ['fullname', 'idnumber'], 'c')->wrap('AND ', '')
            )
            ->replace_comment('where', ($where ?? new sql(''))->wrap('AND (', ')'));

        $exclude = array_values(array_filter($exclude, fn($id) => is_string($id) && preg_match('/^\d+$/D', $id)));
        if ($exclude) {
            [$notin, $params] = $DB->get_in_or_equal($exclude, SQL_PARAMS_NAMED, 'cex', false);
            $sql = $sql->replace_comment('exclude', new sql("AND c.id $notin", $params));
        }

        $certifications = $DB->get_records_sql($sql->sql, $sql->params, 0, $maxitems + 1);
        if (count($certifications) > $maxitems) {
            return null;
        }
        $result = [];
        foreach ($certifications as $certification) {
            $result[(string)$certification->id] = self::format_certification_label($certification);
        }
        return $result;
    }

    /**
     * Labels of certifications that may be selected, unknown or not allowed ids are left out.
     *
     * @param string $capability required in the certification context
     * @param string[] $ids
     * @param sql|null $where extra condition on table aliases "c" and "cctx"
     * @return array [id => label html]
     */
    protected function certification_labels(string $capability, array $ids, ?sql $where = null): array {
        global $DB;

        $ids = array_values(array_filter($ids, fn($id) => is_string($id) && preg_match('/^[1-9][0-9]*$/D', $id)));
        if (!$ids) {
            return [];
        }
        [$insql, $inparams] = $DB->get_in_or_equal($ids, SQL_PARAMS_NAMED, 'cids');
        $sql = (new sql(
            "SELECT c.id, c.fullname, c.contextid
               FROM {tool_mucertify_certification} c
               JOIN {context} cctx ON cctx.id = c.contextid
              WHERE c.id $insql /* where */
           ORDER BY c.id ASC",
            $inparams
        ))->replace_comment('where', ($where ?? new sql(''))->wrap('AND (', ')'));

        $result = [];
        foreach ($DB->get_records_sql($sql->sql, $sql->params) as $certification) {
            if (!has_capability($capability, context::instance_by_id($certification->contextid))) {
                continue;
            }
            $result[(string)$certification->id] = self::format_certification_label($certification);
        }
        return $result;
    }

    /**
     * Label of a certification that may be selected.
     *
     * @param string $capability required in the certification context
     * @param string $value certification id
     * @param sql|null $where extra condition on table aliases "c" and "cctx"
     * @return string|null label html, null when unknown or not allowed
     */
    protected function certification_label(string $capability, string $value, ?sql $where = null): ?string {
        return $this->certification_labels($capability, [$value], $where)[$value] ?? null;
    }

    /**
     * Tenant condition on certification context alias "cctx" for certifications used by an item in the context.
     *
     * @param context $context context of the edited item
     * @param bool $strict true means certifications of the same tenant only, or certifications without tenant
     *      when the item has no tenant; false means certifications of the same tenant or without tenant
     * @return sql|null null when no condition is necessary
     */
    protected static function get_certification_tenant_where(context $context, bool $strict): ?sql {
        if (!mulib::is_mutenancy_active()) {
            return null;
        }
        if ($context->tenantid) {
            if ($strict) {
                return new sql("cctx.tenantid = ?", [$context->tenantid]);
            }
            return new sql("(cctx.tenantid = ? OR cctx.tenantid IS NULL)", [$context->tenantid]);
        }
        if ($strict) {
            return new sql("cctx.tenantid IS NULL");
        }
        return null;
    }

    /**
     * Format certification label.
     *
     * @param \stdClass $certification with fullname and contextid
     * @return string label html
     */
    private static function format_certification_label(\stdClass $certification): string {
        $context = context::instance_by_id($certification->contextid);
        return clean_text(format_string($certification->fullname, true, ['context' => $context]));
    }
}
