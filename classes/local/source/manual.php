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

namespace tool_certify\local\source;

use tool_certify\local\source\base;
use stdClass;
use tool_certify\local\assignment;
use tool_certify\local\notification_manager;

/**
 * Manual certification assignment.
 *
 * @package    tool_certify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
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
     * Is it possible to manually edit user assignment?
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @return bool
     */
    public static function assignment_edit_supported(stdClass $certification, stdClass $source, stdClass $assignment): bool {
        return true;
    }

    /**
     * Is it possible to manually delete user assignment?
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @param stdClass $assignment
     * @return bool
     */
    public static function assignment_delete_supported(stdClass $certification, stdClass $source, stdClass $assignment): bool {
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
        if ($certification->archived) {
            return false;
        }
        if (!$certification->programid1) {
            return false;
        }
        if (!$DB->record_exists('enrol_programs_programs', ['id' => $certification->programid1])) {
            return false;
        }
        return true;
    }

    /**
     * assignment related buttons for certification management page.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @return array
     */
    public static function get_management_certification_users_buttons(stdClass $certification, stdClass $source): array {
        global $PAGE;

        /** @var \local_openlms\output\dialog_form\renderer $dialogformoutput */
        $dialogformoutput = $PAGE->get_renderer('local_openlms', 'dialog_form');

        if ($source->type !== static::get_type()) {
            throw new \coding_exception('invalid instance');
        }
        $enabled = self::is_assignment_possible($certification, $source);
        $context = \context::instance_by_id($certification->contextid);
        $buttons = [];
        if ($enabled && has_capability('tool/certify:assign', $context)) {
            $url = new \moodle_url('/admin/tool/certify/management/source_manual_assign.php', ['sourceid' => $source->id]);
            $button = new \local_openlms\output\dialog_form\button($url, get_string('source_manual_assignusers', 'tool_certify'));
            $buttons[] = $dialogformoutput->render($button);

            $url = new \moodle_url('/admin/tool/certify/management/source_manual_upload.php', ['sourceid' => $source->id]);
            $button = new \local_openlms\output\dialog_form\button($url, get_string('source_manual_uploadusers', 'tool_certify'));
            $buttons[] = $dialogformoutput->render($button);
        }
        return $buttons;
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
     * @return void
     */
    public static function assign_users(int $certificationid, int $sourceid, array $userids, array $dateoverrides = []): void {
        global $DB;

        $certification = $DB->get_record('tool_certify_certifications', ['id' => $certificationid], '*', MUST_EXIST);
        $source = $DB->get_record('tool_certify_sources',
            ['id' => $sourceid, 'type' => static::get_type(), 'certificationid' => $certification->id], '*', MUST_EXIST);

        if (count($userids) === 0) {
            return;
        }

        foreach ($userids as $userid) {
            $user = $DB->get_record('user', ['id' => $userid, 'deleted' => 0], '*', MUST_EXIST);
            if ($DB->record_exists('tool_certify_assignments', ['certificationid' => $certification->id, 'userid' => $user->id])) {
                // One assignment per certification only.
                continue;
            }
            self::assign_user($certification, $source, $user->id, [], $dateoverrides);
        }

        if (count($userids) === 1) {
            $userid = reset($userids);
        } else {
            $userid = null;
        }

        \enrol_programs\local\source\certify::sync_certifications($certification->id, $userid);
        \tool_certify\local\notification_manager::trigger_notifications($certification->id, $userid);
    }

    /**
     * Stores csv file contents as normalised JSON file.
     *
     * NOTE: uploaded file is deleted and instead a new data.json file is stored.
     *
     * @param int $draftid
     * @param array $filedata
     * @return void
     */
    public static function store_uploaded_data(int $draftid, array $filedata): void {
        global $USER;

        $fs = get_file_storage();
        $context = \context_user::instance($USER->id);

        $fs->delete_area_files($context->id, 'tool_certify', 'upload', $draftid);

        $content = json_encode($filedata, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $record = [
            'contextid' => $context->id,
            'component' => 'tool_certify',
            'filearea' => 'upload',
            'itemid' => $draftid,
            'filepath' => '/',
            'filename' => 'data.json',
        ];

        $fs->create_file_from_string($record, $content);
    }

    /**
     * Returns preprocessed data.json user assignment file contents.
     *
     * @param int $draftid
     * @return array|null
     */
    public static function get_uploaded_data(int $draftid): ?array {
        global $USER;

        if (!$draftid) {
            return null;
        }

        $fs = get_file_storage();
        $context = \context_user::instance($USER->id);

        $file = $fs->get_file($context->id, 'tool_certify', 'upload', $draftid, '/', 'data.json');
        if (!$file) {
            return null;
        }
        $data = json_decode($file->get_content(), true);
        if (!is_array($data)) {
            return null;
        }
        $data = fix_utf8($data);
        return $data;
    }

    /**
     * Returns preprocessed user assignment upload file contents.
     *
     * NOTE: data.json file is deleted.
     *
     * @param stdClass $data form submission data
     * @param array $filedata decoded data.json file
     * @return array with keys 'assigned', 'skipped' and 'errors'
     */
    public static function process_uploaded_data(stdClass $data, array $filedata): array {
        global $DB, $USER;

        if ($data->usermapping !== 'username'
                && $data->usermapping !== 'email'
                && $data->usermapping !== 'idnumber'
        ) {
            // We need to prevent SQL injections in get_record later!
            throw new \coding_exception('Invalid usermapping value');
        }

        $result = [
            'assigned' => 0,
            'skipped' => 0,
            'errors' => 0,
        ];

        $source = $DB->get_record('tool_certify_sources', ['id' => $data->sourceid, 'type' => 'manual'], '*', MUST_EXIST);
        $certification = $DB->get_record('tool_certify_certifications', ['id' => $source->certificationid], '*', MUST_EXIST);

        if ($data->hasheaders) {
            unset($filedata[0]);
        }

        $datefields = ['timestartcolumn' => 'timewindowstart', 'timeduecolumn' => 'timewindowdue', 'timeendcolumn' => 'timewindowend'];
        $datecolumns = [];
        foreach ($datefields as $key => $value) {
            if (isset($data->{$key}) && $data->{$key} != -1) {
                $datecolumns[$value] = $data->{$key};
            }
        }

        $userids = [];
        foreach ($filedata as $i => $row) {
            $userident = $row[$data->usercolumn];
            if (!$userident) {
                $result['errors']++;
                continue;
            }
            $users = $DB->get_records('user', [$data->usermapping => $userident, 'deleted' => 0, 'confirmed' => 1]);
            if (count($users) !== 1) {
                $result['errors']++;
                continue;
            }
            $user = reset($users);
            if (isguestuser($user->id)) {
                $result['errors']++;
                continue;
            }
            if ($DB->record_exists('tool_certify_assignments', ['certificationid' => $certification->id, 'userid' => $user->id])) {
                $result['skipped']++;
                continue;
            }

            $dateoverrides = [];
            foreach ($datecolumns as $key => $value) {
                if (!empty($row[$value])) {
                    $dateoverrides[$key] = strtotime($row[$value]);
                    if ($dateoverrides[$key] === false) {
                        $result['errors']++;
                        continue 2;
                    }
                }
            }

            if (!(self::assign_user($certification, $source, $user->id, [], $dateoverrides))) {
                $result['errors']++;
                continue;
            }
            \enrol_programs\local\source\certify::sync_certifications($certification->id, $user->id);
            \tool_certify\local\notification_manager::trigger_notifications($certification->id, $user->id);
            $userids[] = $user->id;
        }

        $result['assigned'] = count($userids);

        if (!empty($data->csvfile)) {
            $fs = get_file_storage();
            $context = \context_user::instance($USER->id);
            $fs->delete_area_files($context->id, 'user', 'draft', $data->csvfile);
            $fs->delete_area_files($context->id, 'tool_certify', 'upload', $data->csvfile);
        }

        return $result;
    }

    /**
     * Deletes old orphaned upload related data.
     *
     * @return void
     */
    public static function cleanup_uploaded_data(): void {
        global $DB;

        $fs = get_file_storage();
        $sql = "SELECT contextid, itemid
                  FROM {files}
                 WHERE component = 'tool_certify' AND filearea = 'upload' AND filepath = '/' AND filename = '.'
                       AND timecreated < :old";
        $rs = $DB->get_recordset_sql($sql, ['old' => time() - 60*60*24*2]);
        foreach ($rs as $dir) {
            $fs->delete_area_files($dir->contextid, 'tool_certify', 'upload', $dir->itemid);
        }
        $rs->close();
    }
}

