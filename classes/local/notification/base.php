<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

namespace tool_certify\local\notification;

use stdClass;
use moodle_url;

/**
 * Certification notification base.
 *
 * @package    tool_certify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class base extends \local_openlms\notification\notificationtype {
    /**
     * Returns message provider name.
     *
     * @return string
     */
    public static function get_provider(): string {
        return static::get_notificationtype() . '_notification';
    }

    /**
     * Returns sender of notifications.
     *
     * @param \stdClass $certification
     * @param \stdClass $assignment
     * @return \stdClass
     */
    public static function get_notifier(\stdClass $certification, \stdClass $assignment): \stdClass {
        return \core_user::get_noreply_user();
    }

    /**
     * Returns relateduser field id.
     * @return int|null
     */
    public static function get_relateduser_fieldid(): ?int {
        if (!get_config('profilefield_relateduser', 'version')) {
            return null;
        }
        $fieldid = (int)get_config('tool_certify', 'notification_relateduserfield');
        if ($fieldid > 0) {
            return $fieldid;
        }
        return null;
    }

    /**
     * Returns relateduser.
     *
     * @param int $userid
     * @return stdClass|null
     */
    public static function get_relateduser(int $userid): ?stdClass {
        global $DB;

        $fieldid = self::get_relateduser_fieldid();
        if (!$fieldid) {
            return null;
        }
        $ruid = $DB->get_field('user_info_data', 'data', ['fieldid' => $fieldid, 'userid' => $userid]);
        if (!$ruid) {
            return null;
        }
        $relateduser = $DB->get_record('user', ['id' => $ruid, 'deleted' => 0, 'confirmed' => 1]);
        if (!$relateduser) {
            return null;
        }
        return $relateduser;
    }

    /**
     * Returns standard certification assignment placeholders.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @param stdClass $user
     * @param stdClass|null $relateduser
     * @return array
     */
    public static function get_assignment_placeholders(stdClass $certification, stdClass $source, stdClass $assignment,
                                                       stdClass $user, ?stdClass $relateduser = null): array {
        /** @var \tool_certify\local\source\base[] $sourceclasses */
        $sourceclasses = \tool_certify\local\assignment::get_source_classes();
        if (isset($sourceclasses[$source->type])) {
            $classname = $sourceclasses[$source->type];
            $sourcename = $classname::get_name();
        } else {
            $sourcename = get_string('error');
        }

        if ($certification->id != $source->certificationid || $source->id != $assignment->sourceid || $user->id != $assignment->userid) {
            throw new \coding_exception('invalid parameter mix');
        }

        $a = [];
        $a['user_fullname'] = s(fullname($user));
        $a['user_firstname'] = s($user->firstname);
        $a['user_lastname'] = s($user->lastname);
        $a['certification_fullname'] = format_string($certification->fullname);
        $a['certification_idnumber'] = s($certification->idnumber);
        $a['certification_url'] = (new moodle_url('/admin/tool/certify/my/certification.php', ['id' => $certification->id]))->out(false);
        $a['certification_sourcename'] = $sourcename;
        $a['certification_status'] = \tool_certify\local\assignment::get_status_html($certification, $assignment);

        if ($relateduser) {
            $context = \context::instance_by_id($certification->contextid);
            $a['relateduser_fullname'] = s(fullname($relateduser));
            $a['relateduser_firstname'] = s($relateduser->firstname);
            $a['relateduser_lastname'] = s($relateduser->lastname);
            if (has_capability('tool/certify:view', $context, $relateduser)) {
                $a['certification_url'] = (new moodle_url('/admin/tool/certify/management/user_assignment.php', ['id' => $assignment->id]))->out(false);
            } else {
                $a['certification_url'] = (new moodle_url('/admin/tool/certify/catalogue/certification.php', ['id' => $certification->id]))->out(false);
            }
        }

        return $a;
    }

    /**
     * Returns standard certification period placeholders.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @param stdClass $period
     * @param stdClass $user
     * @param stdClass|null $relateduser
     * @return array
     */
    public static function get_period_placeholders(stdClass $certification, stdClass $source, stdClass $assignment, stdClass $period,
                                                   stdClass $user, ?stdClass $relateduser = null): array {
        if ($period->certificationid != $assignment->certificationid || $period->userid != $assignment->userid) {
            throw new \coding_exception('invalid parameter mix');
        }

        $strnotset = get_string('notset', 'tool_certify');

        $a = static::get_assignment_placeholders($certification, $source, $assignment, $user, $relateduser);

        $a['period_status'] = \tool_certify\local\period::get_status_html($certification, $assignment, $period);
        $a['period_startdate'] = userdate($period->timewindowstart);
        $a['period_duedate'] = (isset($period->timewindowdue) ? userdate($period->timewindowdue) : $strnotset);
        $a['period_enddate'] = (isset($period->timewindowend) ? userdate($period->timewindowend) : $strnotset);
        $a['period_fromdate'] = (isset($period->timefrom) ? userdate($period->timefrom) : $strnotset);
        $a['period_untildate'] = (isset($period->timeuntil) ? userdate($period->timeuntil) : $strnotset);
        if ($period->timerevoked) {
            $a['period_certificationdate'] = $strnotset;
            $a['period_recertificationdate'] = $strnotset;
        } else {
            $a['period_certificationdate'] = (isset($period->timecertified) ? userdate($period->timecertified) : $strnotset);
            if (isset($certification->recertify) && $period->recertifiable && $period->timeuntil
                && !$certification->archived && !$assignment->archived
            ) {
                $a['period_recertificationdate'] = userdate($period->timeuntil - $certification->recertify);
            } else {
                $a['period_recertificationdate'] = $strnotset;
            }
        }

        return $a;
    }

    /**
     * Send notification to assigned user.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @param ?stdClass $period
     * @param stdClass $user
     * @param bool $alowmultiple
     * @return void
     */
    protected static function notify_assigned_user(stdClass $certification, stdClass $source, stdClass $assignment, ?stdClass $period, stdClass $user, bool $alowmultiple = false): void {
        global $DB;

        if ($certification->archived) {
            // Never send notifications for archived certification.
            return;
        }

        if ($assignment->archived && static::get_notificationtype() !== 'unassignment') {
            // Notification for unassigned is different because we require archiving before unassignment.
            return;
        }

        if ($user->deleted || $user->suspended) {
            // Skip also suspended users in case they are unsuspended in the next few days
            // then they would get at least some missed notifications.
            return;
        }

        $notification = $DB->get_record('local_openlms_notifications', [
            'instanceid' => $certification->id,
            'component' => static::get_component(),
            'notificationtype' => static::get_notificationtype(),
        ]);
        if (!$notification || !$notification->enabled) {
            return;
        }

        try {
            self::force_language($user->lang);

            if ($period) {
                $a = static::get_period_placeholders($certification, $source, $assignment, $period, $user);
                $periodid = $period->id;
            } else {
                $a = static::get_assignment_placeholders($certification, $source, $assignment, $user);
                $periodid = null;
            }
            $subject = static::get_subject($notification, $a);
            $body = static::get_body($notification, $a);

            $message = new \core\message\message();
            $message->notification = '1';
            $message->component = static::get_component();
            $message->name = static::get_provider();
            $message->userfrom = static::get_notifier($certification, $assignment);
            $message->userto = $user;
            $message->subject = $subject;
            $message->fullmessage = $body;
            $message->fullmessageformat = FORMAT_HTML;
            $message->fullmessagehtml = $body;
            $message->smallmessage = $subject;
            $message->contexturlname = $a['certification_fullname'];
            $message->contexturl = $a['certification_url'] ?? null;

            self::message_send($message, $notification->id, $user->id, $assignment->id, $periodid, $alowmultiple);
        } finally {
            self::revert_language();
        }
    }

    /**
     * Send notification to assigned user.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @param ?stdClass $period
     * @param stdClass $user assigned user
     * @param stdClass $relateduser user related to assigned user
     * @param bool $alowmultiple
     * @return void
     */
    protected static function notify_related_user(stdClass $certification, stdClass $source, stdClass $assignment, ?stdClass $period,
                                                  stdClass $user, stdClass $relateduser, bool $alowmultiple = false): void {
        global $DB;

        if ($certification->archived) {
            // Never send notifications for archived certification.
            return;
        }

        if ($assignment->archived
            && static::get_notificationtype() !== 'unassignment'
            && static::get_notificationtype() !== 'unassignment_relateduser'
        ) {
            // Notification for unassigned is different because we require archiving before unassignment.
            return;
        }

        if ($user->deleted) {
            // Do not skip suspended users here, the managers might want to know what is going on with suspended users.
            return;
        }

        if (!$relateduser || $relateduser->suspended) {
            return;
        }

        $notification = $DB->get_record('local_openlms_notifications', [
            'instanceid' => $certification->id,
            'component' => static::get_component(),
            'notificationtype' => static::get_notificationtype(),
        ]);
        if (!$notification || !$notification->enabled) {
            return;
        }

        try {
            self::force_language($user->lang);

            if ($period) {
                $a = static::get_period_placeholders($certification, $source, $assignment, $period, $user, $relateduser);
                $periodid = $period->id;
            } else {
                $a = static::get_assignment_placeholders($certification, $source, $assignment, $user, $relateduser);
                $periodid = null;
            }
            $subject = static::get_subject($notification, $a);
            $body = static::get_body($notification, $a);

            $message = new \core\message\message();
            $message->notification = '1';
            $message->component = static::get_component();
            $message->name = static::get_provider();
            $message->userfrom = static::get_notifier($certification, $assignment);
            $message->userto = $relateduser;
            $message->subject = $subject;
            $message->fullmessage = $body;
            $message->fullmessageformat = FORMAT_HTML;
            $message->fullmessagehtml = $body;
            $message->smallmessage = $subject;
            $message->contexturlname = $a['certification_fullname'];
            $message->contexturl = $a['certification_url'] ?? null;

            self::message_send($message, $notification->id, $relateduser->id, $assignment->id, $periodid, $alowmultiple);
        } finally {
            self::revert_language();
        }
    }

    /**
     * Send notifications.
     *
     * @param stdClass|null $certification
     * @param stdClass|null $user
     * @return void
     */
    abstract public static function notify_users(?stdClass $certification, ?stdClass $user): void;

    /**
     * Delete sent notifications tracking for given assignment.
     *
     * @param \stdClass $assignment
     * @return void
     */
    public static function delete_assignment_notifications(\stdClass $assignment) {
        global $DB;

        $notification = $DB->get_record('local_openlms_notifications', [
            'component' => 'tool_certify',
            'instanceid' => $assignment->certificationid,
            'notificationtype' => static::get_notificationtype(),
        ]);
        if (!$notification) {
            return;
        }
        $DB->delete_records('local_openlms_user_notified', [
            'notificationid' => $notification->id,
            'otherid1' => $assignment->id,
        ]);
    }

    /**
     * Delete sent notifications tracking for given period.
     *
     * @param \stdClass $period
     * @return void
     */
    public static function delete_period_notifications(\stdClass $period) {
        global $DB;

        $notification = $DB->get_record('local_openlms_notifications', [
            'component' => 'tool_certify',
            'instanceid' => $period->certificationid,
            'notificationtype' => static::get_notificationtype(),
        ]);
        if (!$notification) {
            return;
        }
        $DB->delete_records('local_openlms_user_notified', [
            'notificationid' => $notification->id,
            'otherid2' => $period->id,
        ]);
    }

    /**
     * Returns notification description text.
     *
     * @return string HTML text converted from Markdown lang string value
     */
    public static function get_description(): string {
        $description = get_string('notification_' . static::get_notificationtype() . '_description', 'tool_certify');
        $description = markdown_to_html($description);
        return $description;
    }

    /**
     * Returns default notification message subject (and small message) from lang pack
     * with original placeholders.
     *
     * @return string as plain text
     */
    public static function get_default_subject(): string {
        return get_string('notification_' . static::get_notificationtype() . '_subject', 'tool_certify');
    }
}
