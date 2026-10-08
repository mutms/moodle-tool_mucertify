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

namespace tool_mucertify\local\notification;

use stdClass;

/**
 * Notification about recertification that was not started because the program was already used.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class renewalblocked extends base {
    /**
     * Send notifications.
     *
     * @param stdClass|null $certification
     * @param stdClass|null $user
     * @return void
     */
    public static function notify_users(?stdClass $certification, ?stdClass $user): void {
        global $DB;

        $source = null;
        $assignment = null;
        $loadfunction = function (stdClass $period) use (&$certification, &$source, &$assignment, &$user): void {
            global $DB;
            if (!$assignment || $assignment->userid != $period->userid || $assignment->certificationid != $period->certificationid) {
                $assignment = $DB->get_record(
                    'tool_mucertify_assignment',
                    ['userid' => $period->userid, 'certificationid' => $period->certificationid],
                    '*',
                    MUST_EXIST
                );
            }
            if (!$source || $source->id != $assignment->sourceid) {
                $source = $DB->get_record('tool_mucertify_source', ['id' => $assignment->sourceid], '*', MUST_EXIST);
            }
            if (!$user || $user->id != $period->userid) {
                $user = $DB->get_record('user', ['id' => $period->userid], '*', MUST_EXIST);
            }
            if (!$certification || $certification->id != $period->certificationid) {
                $certification = $DB->get_record('tool_mucertify_certification', ['id' => $period->certificationid], '*', MUST_EXIST);
            }
        };

        $params = [];
        $certificationselect = '';
        if ($certification) {
            $certificationselect = "AND cp.certificationid = :certificationid";
            $params['certificationid'] = $certification->id;
        }
        $userselect = '';
        if ($user) {
            $userselect = "AND cp.userid = :userid";
            $params['userid'] = $user->id;
        }
        $params['now'] = time();
        $params['cutoff'] = time() - DAYSECS * 90; // Same as in period::process_recertifications().

        // Periods waiting for recertification with program that was already used in another period of user.
        $sql = "SELECT cp.*
                  FROM {tool_mucertify_period} cp
                  JOIN {tool_mucertify_assignment} ca ON ca.userid = cp.userid AND ca.certificationid = cp.certificationid
                  JOIN {user} u ON u.id = ca.userid AND u.deleted = 0 AND u.suspended = 0
                  JOIN {tool_mucertify_source} cs ON cs.id = ca.sourceid
                  JOIN {tool_mucertify_certification} c ON c.id = ca.certificationid
                  JOIN {tool_muprog_program} p ON p.id = c.programid2 AND p.archived = 0 AND p.draft = 0
                  JOIN {tool_mulib_notification} n
                       ON n.component = 'tool_mucertify' AND n.notificationtype = 'renewalblocked' AND n.instanceid = c.id AND n.enabled = 1
             LEFT JOIN {tool_mulib_notification_user} un
                       ON un.notificationid = n.id AND un.userid = ca.userid AND un.otherid1 = ca.id AND un.otherid2 = cp.id
                 WHERE un.id IS NULL AND c.archived = 0 AND ca.archived = 0 AND c.blockprogramreuse = 1
                       AND cp.timerevoked IS NULL AND cp.recertifiable = 1 AND cp.timecertified IS NOT NULL
                       AND cp.timeuntil - c.recertify < :now
                       AND cp.timeuntil > :cutoff
                       AND EXISTS (
                            SELECT 'x'
                              FROM {tool_mucertify_period} used
                             WHERE used.certificationid = cp.certificationid AND used.userid = cp.userid
                                   AND used.programid = c.programid2
                       )
                       $certificationselect $userselect
              ORDER BY c.id, cs.id, ca.userid";
        $rs = $DB->get_recordset_sql($sql, $params);
        foreach ($rs as $period) {
            $loadfunction($period);
            self::notify_assigned_user($certification, $source, $assignment, $period, $user, false);
        }
        $rs->close();
    }
}
