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

namespace tool_mucertify\mureport\entity;

use tool_mureport\mureport\action;
use tool_mureport\mureport\cell;
use tool_mureport\mureport\column;
use tool_mureport\mureport\entity;
use tool_mureport\mureport\export_value;
use tool_mureport\mureport\filter;
use tool_mureport\mureport\row;
use tool_mulib\local\sql;
use core\lang_string;
use core\url;
use stdClass;

/**
 * Certification assignment entity, assignments of users in tool_mucertify_assignment.
 *
 * Helper joins: alias_certification for the certification, alias_source for the assignment source.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class assignment extends entity {
    #[\Override]
    public function get_default_source(): sql {
        return new sql('{tool_mucertify_assignment}');
    }

    #[\Override]
    protected function get_default_title(): string {
        return get_string('assignment', 'tool_mucertify');
    }

    #[\Override]
    public function get_column_names(): array {
        return ['timecertifiedfrom', 'timecertifieduntil', 'source', 'status', 'archived', 'timecreated', 'actions'];
    }

    #[\Override]
    protected function define_columns(string $selector): array {
        $alias = $this->alias;
        $column = match ($selector) {
            'timecertifiedfrom' => $this->create_column(
                'timecertifiedfrom',
                new lang_string('fromdate', 'tool_mucertify'),
                column::TYPE_TIMESTAMP
            )
                ->add_field('timecertifiedfrom', "$alias.timecertifiedfrom")
                ->set_sortable(true),
            'timecertifieduntil' => $this->define_timecertifieduntil_column(),
            'source' => $this->define_source_column(),
            'status' => $this->define_status_column(),
            'archived' => $this->create_column('archived', new lang_string('archived', 'tool_mucertify'), column::TYPE_BOOLEAN)
                ->add_field('archived', "$alias.archived")
                ->set_sortable(true),
            'timecreated' => $this->create_column(
                'timecreated',
                new lang_string('timecreated', 'core_reportbuilder'),
                column::TYPE_TIMESTAMP
            )
                ->add_field('timecreated', "$alias.timecreated")
                ->set_sortable(true),
            'actions' => $this->define_actions_column(),
            default => null,
        };
        return $column ? [$column] : [];
    }

    #[\Override]
    public function get_filter_names(): array {
        return ['status', 'source', 'archived', 'timecertifiedfrom', 'timecertifieduntil', 'timecreated'];
    }

    #[\Override]
    protected function define_filters(string $selector): array {
        $alias = $this->alias;
        $filter = match ($selector) {
            'status' => (new filter\checkboxes(
                $alias,
                'status',
                new lang_string('certificationstatus', 'tool_mucertify'),
                $this->get_status_sql()
            ))
                ->add_helper_join("{$alias}_certification")
                ->set_options(fn(): array => self::get_status_options()),
            'source' => (new filter\checkboxes(
                $alias,
                'source',
                new lang_string('source', 'tool_mucertify'),
                "{$alias}_source.type"
            ))
                ->add_helper_join("{$alias}_source")
                ->set_options(fn(): array => \tool_mucertify\local\assignment::get_source_names())
                ->set_present_values_only(),
            'archived' => new filter\boolean($alias, 'archived', new lang_string('archived', 'tool_mucertify'), "$alias.archived"),
            'timecertifiedfrom' => new filter\date(
                $alias,
                'timecertifiedfrom',
                new lang_string('fromdate', 'tool_mucertify'),
                "$alias.timecertifiedfrom"
            ),
            'timecertifieduntil' => new filter\date(
                $alias,
                'timecertifieduntil',
                new lang_string('untildate', 'tool_mucertify'),
                "COALESCE($alias.timecertifiedtemp, $alias.timecertifieduntil)"
            ),
            'timecreated' => new filter\date(
                $alias,
                'timecreated',
                new lang_string('timecreated', 'core_reportbuilder'),
                "$alias.timecreated"
            ),
            default => null,
        };
        return $filter ? [$filter] : [];
    }

    #[\Override]
    public function get_helper_join(string $helperalias): sql {
        if ($helperalias === "{$this->alias}_certification") {
            return new sql("JOIN {tool_mucertify_certification} $helperalias
                                 ON $helperalias.id = {$this->alias}.certificationid");
        }
        if ($helperalias === "{$this->alias}_source") {
            return new sql("JOIN {tool_mucertify_source} $helperalias ON $helperalias.id = {$this->alias}.sourceid");
        }
        return parent::get_helper_join($helperalias);
    }

    #[\Override]
    public function get_context_sql(): ?sql {
        $certification = "{$this->alias}_ctxc";
        return new sql("(SELECT $certification.contextid
                           FROM {tool_mucertify_certification} $certification
                          WHERE $certification.id = {$this->alias}.certificationid)");
    }

    #[\Override]
    public function get_context_for_key(int|string $key): ?\core\context {
        global $DB;
        $sql = "SELECT c.contextid
                  FROM {tool_mucertify_assignment} a
                  JOIN {tool_mucertify_certification} c ON c.id = a.certificationid
                 WHERE a.id = :id";
        $contextid = $DB->get_field_sql($sql, ['id' => $key]);
        return $contextid ? (\core\context::instance_by_id($contextid, IGNORE_MISSING) ?: null) : null;
    }

    /**
     * Define expiration column, temporary validity wins, certifications without expiration say so.
     *
     * @return column
     */
    private function define_timecertifieduntil_column(): column {
        $alias = $this->alias;
        $forever = fn(cell $cell): bool => (int)$cell->get_value() === \tool_mulib\local\date_util::TIMESTAMP_FOREVER;
        $column = $this->create_column('timecertifieduntil', new lang_string('untildate', 'tool_mucertify'), column::TYPE_TIMESTAMP)
            ->add_field('timecertifieduntil', "COALESCE($alias.timecertifiedtemp, $alias.timecertifieduntil)")
            ->set_sortable(true);
        $datetime = $column->get_formatters()['datetime'];
        return $column
            ->add_formatter(
                'expiration',
                fn(cell $cell): string => $forever($cell)
                    ? get_string('noexpiration', 'tool_mucertify') : $datetime->display($cell),
                fn(cell $cell): export_value => $forever($cell)
                    ? export_value::text(get_string('noexpiration', 'tool_mucertify')) : $datetime->export($cell)
            )
            ->set_default_formatter('expiration');
    }

    /**
     * Define assignment source column.
     *
     * @return column
     */
    private function define_source_column(): column {
        $alias = $this->alias;
        $name = function (stdClass $fields): string {
            $class = \tool_mucertify\local\assignment::get_source_classname((string)$fields->type);
            return $class ? $class::get_name() : '';
        };
        return $this->create_column('source', new lang_string('source', 'tool_mucertify'), column::TYPE_TEXT)
            ->add_helper_join("{$alias}_source")
            ->add_field('type', "{$alias}_source.type")
            ->add_formatter(
                'name',
                fn(cell $cell): string => s($name($cell->get_fields())),
                fn(cell $cell): export_value => export_value::text($name($cell->get_fields()))
            )
            ->set_default_formatter('name');
    }

    /**
     * Define certification status column.
     *
     * @return column
     */
    private function define_status_column(): column {
        $badges = [
            'archived' => 'bg-dark',
            'notcertified' => 'bg-light text-dark',
            'expired' => 'bg-light text-dark',
            'temporary' => 'bg-success',
            'valid' => 'bg-success',
        ];
        $label = fn(cell $cell): string => get_string('certificationstatus_' . $cell->get_value(), 'tool_mucertify');
        return $this->create_column('status', new lang_string('certificationstatus', 'tool_mucertify'), column::TYPE_TEXT)
            ->add_helper_join("{$this->alias}_certification")
            ->add_field('status', $this->get_status_sql())
            ->add_formatter(
                'badge',
                fn(cell $cell): string => '<span class="badge ' . $badges[$cell->get_value()] . '">' . $label($cell) . '</span>',
                fn(cell $cell): export_value => export_value::text($label($cell))
            )
            ->set_default_formatter('badge');
    }

    /**
     * Define assignment actions, the source of each assignment decides what is possible.
     *
     * @return column
     */
    private function define_actions_column(): column {
        $alias = $this->alias;
        $column = $this->create_actions_column('actions', new lang_string('actions'))
            ->add_helper_join("{$alias}_certification")
            ->add_helper_join("{$alias}_source")
            ->add_field('type', "{$alias}_source.type")
            ->add_field('certificationarchived', "{$alias}_certification.archived");
        foreach (['id', 'certificationid', 'sourceid', 'archived'] as $field) {
            $column->add_field($field, "$alias.$field");
        }

        $assignments = [];
        $possible = function (stdClass $fields, row $row, string $capability, string $check) use ($alias, &$assignments): bool {
            global $DB;
            $context = $row->get_context($alias);
            if (!$context || !has_capability($capability, $context)) {
                return false;
            }
            $class = \tool_mucertify\local\assignment::get_source_classname((string)$fields->type);
            if (!$class) {
                return false;
            }
            $assignments[$fields->id] ??= $DB->get_record('tool_mucertify_assignment', ['id' => $fields->id]);
            if (!$assignments[$fields->id]) {
                return false;
            }
            $certification = $row->get_cached_record('tool_mucertify_certification', (int)$fields->certificationid);
            $source = $row->get_cached_record('tool_mucertify_source', (int)$fields->sourceid);
            return $class::$check($certification, $source, $assignments[$fields->id]);
        };
        $url = fn(string $script): \Closure => fn(stdClass $fields): url
            => new url("/admin/tool/mucertify/management/$script.php", ['id' => $fields->id]);

        $column->add_action(new action('update', new lang_string('assignment_update', 'tool_mucertify'), 'i/settings'))
            ->set_available(fn(stdClass $fields, row $row): bool => !$fields->archived && !$fields->certificationarchived
                && $possible($fields, $row, 'tool/mucertify:admin', 'is_assignment_update_possible'))
            ->set_url($url('assignment_update'))
            ->set_dialog('lg');
        $column->add_action(new action('archive', new lang_string('assignment_archive', 'tool_mucertify'), 'i/lock'))
            ->set_available(fn(stdClass $fields, row $row): bool => !$fields->archived && !$fields->certificationarchived
                && $possible($fields, $row, 'tool/mucertify:unassign', 'is_assignment_archive_possible'))
            ->set_url($url('assignment_archive'))
            ->set_dialog('sm');
        $column->add_action(new action('restore', new lang_string('assignment_restore', 'tool_mucertify'), 'i/unlock'))
            ->set_available(fn(stdClass $fields, row $row): bool => $fields->archived && !$fields->certificationarchived
                && $possible($fields, $row, 'tool/mucertify:assign', 'is_assignment_restore_possible'))
            ->set_url($url('assignment_restore'))
            ->set_dialog('sm');
        $column->add_action(new action('delete', new lang_string('assignment_delete', 'tool_mucertify'), 'i/delete'))
            ->set_available(fn(stdClass $fields, row $row): bool => $fields->archived && !$fields->certificationarchived
                && $possible($fields, $row, 'tool/mucertify:unassign', 'is_assignment_delete_possible'))
            ->set_url($url('assignment_delete'))
            ->set_dialog('sm')
            ->set_destructive();

        return $column;
    }

    /**
     * Returns status of assignments in SQL, archived assignments and certifications first.
     *
     * @return sql
     */
    private function get_status_sql(): sql {
        $alias = $this->alias;
        $until = "COALESCE($alias.timecertifiedtemp, $alias.timecertifieduntil)";
        return new sql(
            "CASE
                WHEN $alias.archived = 1 OR {$alias}_certification.archived = 1 THEN 'archived'
                WHEN $alias.timecertifiedfrom IS NULL OR $alias.timecertifiedfrom > :{$alias}now1 THEN 'notcertified'
                WHEN $until < :{$alias}now2 THEN 'expired'
                WHEN $alias.timecertifiedtemp > :{$alias}now3 THEN 'temporary'
                ELSE 'valid'
            END",
            ["{$alias}now1" => time(), "{$alias}now2" => time(), "{$alias}now3" => time()]
        );
    }

    /**
     * Returns assignment statuses.
     *
     * @return array status => label
     */
    public static function get_status_options(): array {
        $result = [];
        foreach (['valid', 'temporary', 'expired', 'notcertified', 'archived'] as $status) {
            $result[$status] = get_string('certificationstatus_' . $status, 'tool_mucertify');
        }
        return $result;
    }
}
