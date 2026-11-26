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

use tool_mureport\mureport\cell;
use tool_mureport\mureport\column;
use tool_mureport\mureport\entity;
use tool_mureport\mureport\export_value;
use tool_mulib\local\sql;
use core\lang_string;
use core\url;
use stdClass;

/**
 * Certification period entity, periods of users in tool_mucertify_period.
 *
 * Helper joins: alias_assignment for the assignment of the user, alias_certification for the certification,
 * alias_program and alias_allocation for the program of the period and its allocation.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class period extends entity {
    /** @var array status => badge classes */
    private const BADGES = [
        'archived' => 'bg-dark',
        'revoked' => 'bg-danger',
        'certified' => 'bg-success',
        'expired' => 'bg-light text-dark',
        'failed' => 'bg-danger',
        'overdue' => 'bg-danger',
        'future' => 'bg-light text-dark',
        'pending' => 'bg-warning text-dark',
    ];

    #[\Override]
    public function get_default_source(): sql {
        return new sql('{tool_mucertify_period}');
    }

    #[\Override]
    protected function get_default_title(): string {
        return get_string('period', 'tool_mucertify');
    }

    #[\Override]
    public function get_column_names(): array {
        return ['timewindowstart', 'timewindowdue', 'timewindowend', 'program', 'timefrom', 'timeuntil', 'recertify', 'status'];
    }

    #[\Override]
    protected function define_columns(string $selector): array {
        $column = match ($selector) {
            'timewindowstart' => $this->define_date_column('timewindowstart', 'windowstartdate'),
            'timewindowdue' => $this->define_date_column('timewindowdue', 'windowduedate'),
            'timewindowend' => $this->define_date_column('timewindowend', 'windowenddate'),
            'timefrom' => $this->define_date_column('timefrom', 'fromdate'),
            'timeuntil' => $this->define_timeuntil_column(),
            'program' => $this->define_program_column(),
            'recertify' => $this->define_recertify_column(),
            'status' => $this->define_status_column(),
            default => null,
        };
        return $column ? [$column] : [];
    }

    #[\Override]
    public function get_filter_names(): array {
        return [];
    }

    #[\Override]
    protected function define_filters(string $selector): array {
        return [];
    }

    #[\Override]
    public function get_helper_join(string $helperalias): sql {
        $alias = $this->alias;
        return match ($helperalias) {
            "{$alias}_assignment" => new sql("LEFT JOIN {tool_mucertify_assignment} $helperalias
                                                     ON $helperalias.certificationid = $alias.certificationid
                                                        AND $helperalias.userid = $alias.userid"),
            "{$alias}_certification" => new sql("JOIN {tool_mucertify_certification} $helperalias
                                                     ON $helperalias.id = $alias.certificationid"),
            "{$alias}_program" => new sql("LEFT JOIN {tool_muprog_program} $helperalias ON $helperalias.id = $alias.programid"),
            "{$alias}_allocation" => new sql("LEFT JOIN {tool_muprog_allocation} $helperalias
                                                     ON $helperalias.programid = $alias.programid
                                                        AND $helperalias.userid = $alias.userid"),
            default => parent::get_helper_join($helperalias),
        };
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
                  FROM {tool_mucertify_period} p
                  JOIN {tool_mucertify_certification} c ON c.id = p.certificationid
                 WHERE p.id = :id";
        $contextid = $DB->get_field_sql($sql, ['id' => $key]);
        return $contextid ? (\core\context::instance_by_id($contextid, IGNORE_MISSING) ?: null) : null;
    }

    /**
     * Define period date column, missing dates are not set.
     *
     * @param string $name
     * @param string $string
     * @return column
     */
    private function define_date_column(string $name, string $string): column {
        $column = $this->create_column($name, new lang_string($string, 'tool_mucertify'), column::TYPE_TIMESTAMP)
            ->add_field($name, "{$this->alias}.$name")
            ->add_field('id', "{$this->alias}.id")
            ->set_sortable(true);
        $datetime = $column->get_formatters()['datetime'];
        $text = fn(cell $cell): string => $cell->get_value() ? $datetime->display($cell) : get_string('notset', 'tool_mucertify');
        $column->add_formatter(
            'notset',
            $text,
            fn(cell $cell): export_value => $cell->get_value() ? $datetime->export($cell) : export_value::empty()
        );
        if ($name === 'timewindowstart') {
            $column->add_formatter(
                'periodlink',
                fn(cell $cell): string => \html_writer::link(
                    new url('/admin/tool/mucertify/management/period.php', ['id' => $cell->get_fields()->id]),
                    $text($cell)
                ),
                fn(cell $cell): export_value => $cell->get_value() ? $datetime->export($cell) : export_value::empty()
            );
        }
        return $column->set_default_formatter('notset');
    }

    /**
     * Define expiration column, certified periods without expiration say so.
     *
     * @return column
     */
    private function define_timeuntil_column(): column {
        $alias = $this->alias;
        $column = $this->create_column('timeuntil', new lang_string('untildate', 'tool_mucertify'), column::TYPE_TIMESTAMP)
            ->add_field('timeuntil', "$alias.timeuntil")
            ->add_field('timecertified', "$alias.timecertified")
            ->set_sortable(true);
        $datetime = $column->get_formatters()['datetime'];
        $text = function (cell $cell) use ($datetime): ?string {
            if ($cell->get_value()) {
                return null;
            }
            $string = $cell->get_fields()->timecertified ? 'noexpiration' : 'notset';
            return get_string($string, 'tool_mucertify');
        };
        return $column
            ->add_formatter(
                'expiration',
                fn(cell $cell): string => $text($cell) ?? $datetime->display($cell),
                fn(cell $cell): export_value => $text($cell) === null ? $datetime->export($cell) : export_value::text($text($cell))
            )
            ->set_default_formatter('expiration');
    }

    /**
     * Define program column, management links go to the allocation of the user.
     *
     * @return column
     */
    private function define_program_column(): column {
        $alias = $this->alias;
        $name = fn(stdClass $fields): string => $fields->fullname === null ? '' : format_string($fields->fullname, true, [
            'context' => \core\context::instance_by_id($fields->contextid),
        ]);
        return $this->create_column('program', new lang_string('program', 'tool_muprog'), column::TYPE_TEXT)
            ->add_helper_join("{$alias}_program")
            ->add_helper_join("{$alias}_allocation")
            ->add_field('fullname', "{$alias}_program.fullname")
            ->add_field('contextid', "{$alias}_program.contextid")
            ->add_field('programid', "{$alias}_program.id")
            ->add_field('allocationid', "{$alias}_allocation.id")
            ->add_field('userid', "$alias.userid")
            ->add_formatter(
                'management',
                function (cell $cell) use ($name): string {
                    $fields = $cell->get_fields();
                    if ($fields->fullname === null) {
                        return '';
                    }
                    $context = \core\context::instance_by_id($fields->contextid, IGNORE_MISSING);
                    if (!$fields->allocationid || !$context || !has_capability('tool/muprog:view', $context)) {
                        return $name($fields);
                    }
                    $url = new url('/admin/tool/muprog/management/allocation.php', ['id' => $fields->allocationid]);
                    return \html_writer::link($url, $name($fields));
                },
                fn(cell $cell): export_value => export_value::text(strip_tags($name($cell->get_fields())))
            )
            ->add_formatter(
                'allocated',
                function (cell $cell) use ($name): string {
                    $fields = $cell->get_fields();
                    if (!$fields->allocationid || $fields->fullname === null) {
                        return '';
                    }
                    $url = new url('/admin/tool/muprog/my/program.php', ['id' => $fields->programid, 'userid' => $fields->userid]);
                    return \html_writer::link($url, $name($fields));
                },
                fn(cell $cell): export_value => export_value::text($cell->get_fields()->allocationid
                    ? strip_tags($name($cell->get_fields())) : '')
            )
            ->set_default_formatter('management');
    }

    /**
     * Define recertification column, the date when the next window opens.
     *
     * @return column
     */
    private function define_recertify_column(): column {
        $alias = $this->alias;
        $text = function (stdClass $fields): string {
            $active = $fields->assignmentid && !$fields->archived && !$fields->certificationarchived;
            if (!$active || !$fields->recertify || !$fields->recertifiable) {
                return get_string('no');
            }
            if ($fields->timeuntil) {
                return userdate($fields->timeuntil - $fields->recertify, get_string('strftimedatetimeshort'));
            }
            return get_string('recertifyifexpired', 'tool_mucertify');
        };
        return $this->create_column('recertify', new lang_string('recertify', 'tool_mucertify'), column::TYPE_TEXT)
            ->add_helper_join("{$alias}_assignment")
            ->add_helper_join("{$alias}_certification")
            ->add_field('recertify', "{$alias}_certification.recertify")
            ->add_field('certificationarchived', "{$alias}_certification.archived")
            ->add_field('assignmentid', "{$alias}_assignment.id")
            ->add_field('archived', "{$alias}_assignment.archived")
            ->add_field('recertifiable', "$alias.recertifiable")
            ->add_field('timeuntil', "$alias.timeuntil")
            ->add_formatter(
                'text',
                fn(cell $cell): string => s($text($cell->get_fields())),
                fn(cell $cell): export_value => export_value::text($text($cell->get_fields()))
            )
            ->set_default_formatter('text');
    }

    /**
     * Define period status column.
     *
     * @return column
     */
    private function define_status_column(): column {
        $alias = $this->alias;
        $now = time();
        $label = fn(cell $cell): string => get_string('periodstatus_' . $cell->get_value(), 'tool_mucertify');
        return $this->create_column('status', new lang_string('periodstatus', 'tool_mucertify'), column::TYPE_TEXT)
            ->add_helper_join("{$alias}_assignment")
            ->add_helper_join("{$alias}_certification")
            ->add_field('status', new sql(
                "CASE
                    WHEN {$alias}_certification.archived = 1 OR {$alias}_assignment.id IS NULL
                         OR {$alias}_assignment.archived = 1 THEN 'archived'
                    WHEN $alias.timerevoked IS NOT NULL THEN 'revoked'
                    WHEN $alias.timecertified IS NOT NULL AND ($alias.timeuntil IS NULL OR $alias.timeuntil > :{$alias}now1)
                         THEN 'certified'
                    WHEN $alias.timecertified IS NOT NULL THEN 'expired'
                    WHEN $alias.timewindowend IS NOT NULL AND $alias.timewindowend < :{$alias}now2 THEN 'failed'
                    WHEN $alias.timewindowdue IS NOT NULL AND $alias.timewindowdue < :{$alias}now3 THEN 'overdue'
                    WHEN $alias.timewindowstart > :{$alias}now4 THEN 'future'
                    ELSE 'pending'
                END",
                ["{$alias}now1" => $now, "{$alias}now2" => $now, "{$alias}now3" => $now, "{$alias}now4" => $now]
            ))
            ->add_formatter(
                'badge',
                fn(cell $cell): string => \html_writer::span($label($cell), 'badge ' . self::BADGES[$cell->get_value()]),
                fn(cell $cell): export_value => export_value::text($label($cell))
            )
            ->set_default_formatter('badge');
    }
}
