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


namespace tool_mucertify\callback;

/**
 * Hook callbacks for tool_mucohort.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class tool_mucohort {
    /**
     * List places where the cohort is used.
     *
     * @param \tool_mucohort\hook\cohort_usage $hook
     */
    public static function cohort_usage(\tool_mucohort\hook\cohort_usage $hook): void {
        global $DB;

        $cohort = $hook->get_cohort();
        $sql = "SELECT e.id, e.fullname, e.contextid, s.type
                  FROM {tool_mucertify_src_cohort} sc
                  JOIN {tool_mucertify_source} s ON s.id = sc.sourceid
                  JOIN {tool_mucertify_certification} e ON e.id = s.certificationid
                 WHERE sc.cohortid = ?
              ORDER BY e.fullname ASC, e.id ASC";
        foreach ($DB->get_records_sql($sql, [$cohort->id]) as $record) {
            $context = \context::instance_by_id($record->contextid);
            $source = get_string('source_' . $record->type, 'tool_mucertify');
            $section = get_string('cohort_usage_source', 'tool_mucertify', $source);
            $visible = has_capability('tool/mucertify:view', $context);
            $url = null;
            if ($visible) {
                $url = new \core\url('/admin/tool/mucertify/management/certification_assignment.php', ['id' => $record->id]);
            }
            $name = format_string($record->fullname, true, ['context' => $context, 'escape' => false]);
            $hook->add_item($section, $name, $url, null, $visible);
        }
    }
}
