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

use tool_mureport\mureport\cell;
use tool_mureport\mureport\export_value;
use tool_mureport\mureport\join;
use tool_mureport\mureport\system_report;
use tool_mucertify\mureport\entity\assignment;
use tool_mucertify\mureport\entity\certification;
use core\exception\invalid_parameter_exception;
use core\lang_string;
use core\url;

/**
 * Current certifications of a user, assignments that are not archived in certifications that are not archived.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class user_certifications extends system_report {
    /**
     * Make report instance.
     *
     * @param int $userid
     * @return self
     */
    public static function make_instance(int $userid): self {
        return self::from_constraints(['userid' => $userid]);
    }

    #[\Override]
    public static function get_title(): string {
        return get_string('usercertifications', 'tool_mucertify');
    }

    #[\Override]
    public static function is_available(): bool {
        return \tool_mulib\local\mulib::is_mucertify_available();
    }

    #[\Override]
    public function get_context(): \core\context {
        $user = $this->get_constraint_record('user', 'userid');
        if (!$user || $user->deleted || isguestuser($user)) {
            throw new invalid_parameter_exception('Invalid user');
        }
        return \core\context\user::instance($user->id);
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
        $this->set_main_entity(new assignment('assignment'));
        $this->add_entity(
            new certification('certification'),
            new join('assignment', 'certification.id = assignment.certificationid', inner: true)
        );
        $this->add_restriction('assignment.archived = 0 AND certification.archived = 0', ['assignment', 'certification']);

        $this->set_default_columns([
            'certification:fullname',
            'certification:idnumber',
            'assignment:timecertifiedfrom',
            'assignment:timecertifieduntil',
            'assignment:status',
        ]);
        $this->set_default_filters([
            'certification:fullname' => ['multisearch' => true],
            'certification:idnumber' => ['multisearch' => true],
            'assignment:status',
            'assignment:timecertifiedfrom',
            'assignment:timecertifieduntil',
        ]);
        $this->remove_columns([
            'certification:assignmentcount',
            'certification:archived',
            'assignment:archived',
            'assignment:actions',
        ]);
        $this->remove_filters(['certification:archived', 'assignment:archived']);
        $this->set_multisearch_label(new lang_string('certificationsearch', 'tool_mucertify'));
        $this->set_export_allowed(false);
        $this->set_default_sorting(['certification:fullname' => 'asc']);
    }

    #[\Override]
    protected function apply_constraints(): void {
        $this->add_constraint_restriction('userid', 'assignment', 'userid');
    }

    #[\Override]
    protected function define_columns(string $selector): array {
        $columns = parent::define_columns($selector);
        if ($selector === 'certification:fullname') {
            $columns['certification:fullname']
                ->add_alias('assignment')
                ->add_field('userid', 'assignment.userid')
                ->add_formatter('mylink', function (cell $cell): string {
                    $fields = $cell->get_fields();
                    return \html_writer::link(self::get_certification_url($fields), format_string($fields->fullname, true, [
                        'context' => \core\context::instance_by_id($fields->contextid),
                    ]));
                }, fn(cell $cell): export_value => export_value::link(
                    self::get_certification_url($cell->get_fields()),
                    format_string($cell->get_fields()->fullname, true, [
                        'context' => \core\context::instance_by_id($cell->get_fields()->contextid),
                        'escape' => false,
                    ])
                ))
                ->set_default_formatter('mylink');
        }
        return $columns;
    }

    /**
     * Returns URL of certification details of the assigned user.
     *
     * @param \stdClass $fields
     * @return url
     */
    private static function get_certification_url(\stdClass $fields): url {
        return new url('/admin/tool/mucertify/my/certification.php', ['id' => $fields->id, 'userid' => $fields->userid]);
    }
}
