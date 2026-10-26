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

namespace tool_mucertify\local\source;

use stdClass;

/**
 * Manual certification assignment.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class manual extends base {
    /**
     * Return short type name of source, it is used in database to identify this source.
     *
     * NOTE: this must be unique and ite cannot be changed later
     *
     * @return string
     */
    public static function get_type(): string {
        return 'manual';
    }

    /**
     * Manual assignment source cannot be completely prevented.
     *
     * @param stdClass $certification
     * @return bool
     */
    public static function is_new_allowed(stdClass $certification): bool {
        return true;
    }

    /**
     * Can a new source of this type be added to programs when creating program?
     *
     * @return bool
     */
    public static function is_new_allowed_in_new(): bool {
        return true;
    }

    /**
     * Is it possible to manually assign users to this certification?
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @return bool
     */
    public static function is_assignment_possible(stdClass $certification, stdClass $source): bool {
        global $DB;
        if ($certification->id != $source->certificationid) {
            throw new \coding_exception('invalid parameters');
        }
        if ($certification->archived) {
            return false;
        }
        if (!$certification->programid1) {
            return false;
        }
        if (!$DB->record_exists('tool_muprog_program', ['id' => $certification->programid1])) {
            return false;
        }
        return true;
    }

    /**
     * Assignment related buttons for certification management page.
     *
     * @param \tool_mulib\output\header_actions $actions
     * @param stdClass $certification
     * @param stdClass $source
     * @return void
     */
    public static function add_management_certification_users_actions(\tool_mulib\output\header_actions $actions, stdClass $certification, stdClass $source): void {
        if ($source->type !== static::get_type()) {
            throw new \coding_exception('invalid instance');
        }
        $enabled = self::is_assignment_possible($certification, $source);
        $context = \context::instance_by_id($certification->contextid);
        $buttons = [];
        if ($enabled && has_capability('tool/mucertify:assign', $context)) {
            $url = new \core\url('/admin/tool/mucertify/management/source_manual_assign.php', ['sourceid' => $source->id]);
            $button = new \tool_mulib\output\muform\dialog\button($url, get_string('source_manual_assignusers', 'tool_mucertify'));
            $actions->add_button($button);

            $url = new \core\url('/admin/tool/mucertify/management/source_manual_upload.php', ['sourceid' => $source->id]);
            $actions->get_dropdown()->add_item(
                get_string('source_manual_uploadusers', 'tool_mucertify'),
                $url,
                new \core\output\pix_icon('i/publish', '')
            );
        }
    }

    /**
     * Returns the user who is responsible for assignment.
     *
     * Override if plugin knows anybody better than admin.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @return stdClass user record
     */
    public static function get_assigner(stdClass $certification, stdClass $source, stdClass $assignment): stdClass {
        global $USER;

        if (!isloggedin() || isguestuser()) {
            // This should not happen, probably some customisation doing manual assignments.
            return parent::get_assigner($certification, $source, $assignment);
        }

        return $USER;
    }

    /**
     * Assign users manually.
     *
     * @param int $certificationid
     * @param int $sourceid
     * @param array $userids
     * @param array $dateoverrides
     * @return array assignment ids
     */
    public static function assign_users(int $certificationid, int $sourceid, array $userids, array $dateoverrides = []): array {
        global $DB;

        $result = [];

        $certification = $DB->get_record('tool_mucertify_certification', ['id' => $certificationid], '*', MUST_EXIST);
        $source = $DB->get_record(
            'tool_mucertify_source',
            ['id' => $sourceid, 'type' => static::get_type(), 'certificationid' => $certification->id],
            '*',
            MUST_EXIST
        );

        if (count($userids) === 0) {
            return $result;
        }

        foreach ($userids as $userid) {
            $user = $DB->get_record('user', ['id' => $userid, 'deleted' => 0], '*', MUST_EXIST);
            if ($DB->record_exists('tool_mucertify_assignment', ['certificationid' => $certification->id, 'userid' => $user->id])) {
                // One assignment per certification only.
                continue;
            }
            $assignment = self::assignment_create($certification, $source, $user->id, [], $dateoverrides);
            $result[] = $assignment->id;
        }

        if (count($userids) === 1) {
            $userid = reset($userids);
        } else {
            $userid = null;
        }

        \tool_muprog\local\source\mucertify::sync_certifications($certification->id, $userid);
        \tool_mucertify\local\notification_manager::trigger_notifications($certification->id, $userid);

        return $result;
    }
}
