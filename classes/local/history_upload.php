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

namespace tool_mucertify\local;

use stdClass;

/**
 * Upload of historic certification periods from CSV data.
 *
 * The wizard parses the uploaded or pasted text once, the page keeps the rows, the column
 * meanings and the options in the muform wizard state; this class only validates and
 * transforms that data and runs the upload.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class history_upload {
    /** @var int rows of the dry run preview table */
    public const PREVIEW_ROWS = 10;

    /** @var int rows of the data preview shown with the column meanings */
    public const DATA_PREVIEW_ROWS = 4;

    /** @var string column is not used */
    public const COLUMN_IGNORE = '';

    /** @var string period of the row will be imported */
    public const RESULT_IMPORTED = 'imported';

    /** @var string row was skipped */
    public const RESULT_SKIPPED = 'skipped';

    /** @var string period of the row cannot be imported */
    public const RESULT_ERROR = 'error';

    /** @var array columns that identify users */
    private const USER_COLUMNS = ['username', 'email', 'idnumber'];


    /**
     * Column meanings.
     *
     * @return array column value => label
     */
    public static function get_column_menu(): array {
        return [
            self::COLUMN_IGNORE => get_string('history_upload_column_ignore', 'tool_mucertify'),
            'username' => get_string('username'),
            'email' => get_string('email'),
            'idnumber' => get_string('idnumber'),
            'timefrom' => get_string('fromdate', 'tool_mucertify'),
            'timeuntil' => get_string('untildate', 'tool_mucertify'),
            'timecertified' => get_string('history_upload_column_timecertified', 'tool_mucertify'),
            'evidence' => get_string('evidence_details', 'tool_mucertify'),
        ];
    }

    /**
     * Skip options, each one turns a class of problem into a skipped row.
     *
     * @return array name => label
     */
    public static function get_skip_menu(): array {
        return [
            'skipmissing' => get_string('history_upload_skip_missing', 'tool_mucertify'),
            'skipambiguous' => get_string('history_upload_skip_ambiguous', 'tool_mucertify'),
            'skipnotassigned' => get_string('history_upload_skip_notassigned', 'tool_mucertify'),
            'skipexisting' => get_string('history_upload_skip_existing', 'tool_mucertify'),
            'skipinvalid' => get_string('history_upload_skip_invalid', 'tool_mucertify'),
        ];
    }

    /**
     * Keep only the sections that can be used.
     *
     * @param array $stored decoded document
     * @return stdClass keys: rows, columns, options
     */
    public static function validate(array $stored): stdClass {
        $csvdata = (object)['rows' => [], 'columns' => [], 'options' => []];

        $rows = $stored['rows'] ?? null;
        if (is_array($rows) && !self::check_rows($rows)) {
            $csvdata->rows = fix_utf8(array_values(array_map('array_values', $rows)));
        }
        if (!$csvdata->rows) {
            return $csvdata;
        }

        $columns = $stored['columns'] ?? null;
        if (is_array($columns)) {
            $map = [];
            foreach ($csvdata->rows[0] as $index => $unused) {
                $value = $columns['map'][$index] ?? null;
                $map[$index] = is_string($value) ? $value : self::COLUMN_IGNORE;
            }
            $clean = ['headers' => $columns['headers'] ?? null, 'map' => $map];
            if (!self::check_columns($csvdata->rows, $clean)) {
                $csvdata->columns = $clean;
            }
        }

        $options = $stored['options'] ?? null;
        if (is_array($options)) {
            $clean = [];
            foreach (self::get_option_names() as $name) {
                if (isset($options[$name])) {
                    $clean[$name] = (int)(bool)$options[$name];
                }
            }
            if (isset($options['evidencedefault']) && is_string($options['evidencedefault'])) {
                $clean['evidencedefault'] = clean_param($options['evidencedefault'], PARAM_TEXT);
            }
            if (isset($options['preview']) && is_bool($options['preview'])) {
                // False means the options were confirmed and the upload may run.
                $clean['preview'] = $options['preview'];
            }
            $csvdata->options = $clean;
        }

        return $csvdata;
    }

    /**
     * Problem with the data itself, null when it can be used.
     *
     * @param array $rows first row may hold the column headers
     * @return string|null string identifier of the problem
     */
    public static function check_rows(array $rows): ?string {
        if (count($rows) < 1) {
            return 'history_upload_error_empty';
        }

        $width = null;
        foreach ($rows as $row) {
            if (!is_array($row) || !$row) {
                return 'history_upload_error_rowsize';
            }
            foreach ($row as $value) {
                if (!is_scalar($value)) {
                    return 'history_upload_error_rowsize';
                }
            }
            if ($width !== null && count($row) !== $width) {
                return 'history_upload_error_rowsize';
            }
            $width = count($row);
        }

        return null;
    }

    /**
     * Problems with the columns section, empty when it can be used.
     *
     * @param array $rows all rows of the data
     * @param array $columns section holding the headers flag and the column map
     * @return array string identifier of the problem, keyed by the name of the form element
     */
    public static function check_columns(array $rows, array $columns): array {
        $errors = [];

        $headers = $columns['headers'] ?? null;
        if (!is_bool($headers)) {
            $errors['headers'] = 'history_upload_error_headers';
        } else if ($headers && count($rows) < 2) {
            $errors['headers'] = 'history_upload_error_nodatarows';
        }

        $map = $columns['map'] ?? null;
        if (!is_array($map)) {
            $errors['column_0'] = 'history_upload_error_columnunknown';
            return $errors;
        }

        $menu = self::get_column_menu();
        $used = [];
        foreach (array_keys($rows[0] ?? []) as $index) {
            $value = $map[$index] ?? self::COLUMN_IGNORE;
            if (!is_string($value) || !array_key_exists($value, $menu)) {
                $errors['column_' . $index] = 'history_upload_error_columnunknown';
                continue;
            }
            if ($value === self::COLUMN_IGNORE) {
                continue;
            }
            if (isset($used[$value])) {
                $errors['column_' . $index] = 'history_upload_error_columntwice';
            }
            $used[$value] = true;
        }

        if (!isset($used['timefrom']) || !isset($used['timeuntil'])) {
            $errors['column_0'] = 'history_upload_error_nodatecolumns';
        }
        if (!array_intersect(self::USER_COLUMNS, array_keys($used))) {
            $errors['column_0'] = 'history_upload_error_nouser';
        }

        return $errors;
    }

    /**
     * Rows that hold data, the column names are not one of them.
     *
     * Only for data that passed the columns stage.
     *
     * @param stdClass $csvdata
     * @return array
     */
    public static function get_data_rows(stdClass $csvdata): array {
        return array_slice($csvdata->rows, empty($csvdata->columns['headers']) ? 0 : 1);
    }

    /**
     * Names of all flag options, the options section holds each of them and the default evidence.
     *
     * @return array
     */
    public static function get_option_names(): array {
        return array_merge(array_keys(self::get_skip_menu()), ['assign', 'skipassigned']);
    }

    /**
     * Is the wizard still waiting for the data itself?
     *
     * @param stdClass $csvdata
     * @return bool
     */
    public static function is_source_stage(stdClass $csvdata): bool {
        return self::check_rows($csvdata->rows) !== null;
    }

    /**
     * Is the wizard waiting for the meaning of the columns?
     *
     * Only for data that passed the source stage.
     *
     * @param stdClass $csvdata
     * @return bool
     */
    public static function is_columns_stage(stdClass $csvdata): bool {
        return !$csvdata->columns || (bool)self::check_columns($csvdata->rows, $csvdata->columns);
    }

    /**
     * Is the wizard waiting for the upload options?
     *
     * The wizard moves on only when the options were confirmed, which is what the preview flag records.
     * Only for data that passed the columns stage.
     *
     * @param stdClass $csvdata
     * @return bool
     */
    public static function is_options_stage(stdClass $csvdata): bool {
        if (($csvdata->options['preview'] ?? true) !== false) {
            return true;
        }
        foreach (self::get_option_names() as $name) {
            if (!array_key_exists($name, $csvdata->options)) {
                return true;
            }
        }
        if (trim($csvdata->options['evidencedefault'] ?? '') === '') {
            return true;
        }
        return false;
    }

    /**
     * Data of the source stage, pasted or uploaded CSV, the later stages start over.
     *
     * @param string $content CSV text
     * @param string $encoding
     * @param string $delimitername separator name, or "auto" to detect it
     * @return stdClass keys: rows, columns, options
     */
    public static function save_source(string $content, string $encoding, string $delimitername): stdClass {
        $rows = \tool_mulib\local\import_util::parse($content, $encoding, $delimitername);
        return self::validate(['rows' => $rows]);
    }

    /**
     * Add the meaning of each column, the options have to be confirmed again.
     *
     * @param stdClass $csvdata
     * @param stdClass $formdata data of the columns form
     * @return stdClass keys: rows, columns, options
     */
    public static function save_columns(stdClass $csvdata, stdClass $formdata): stdClass {
        $map = [];
        foreach ($csvdata->rows[0] as $index => $unused) {
            $map[$index] = $formdata->{'column_' . $index} ?? self::COLUMN_IGNORE;
        }
        $csvdata->columns = ['headers' => !empty($formdata->headers), 'map' => $map];
        if ($csvdata->options) {
            // The chosen options stay as defaults, the dry run has to be seen again.
            $csvdata->options['preview'] = true;
        }
        return $csvdata;
    }

    /**
     * Add the confirmed upload options, the wizard has nothing left to ask afterwards.
     *
     * @param stdClass $csvdata
     * @param stdClass $formdata data of the options form
     * @return stdClass keys: rows, columns, options
     */
    public static function save_options(stdClass $csvdata, stdClass $formdata): stdClass {
        $options = [];
        foreach (self::get_option_names() as $name) {
            $options[$name] = (int)(bool)($formdata->$name ?? 0);
        }
        $options['evidencedefault'] = trim((string)($formdata->evidencedefault ?? ''));
        $options['preview'] = false;
        $csvdata->options = $options;
        return $csvdata;
    }

    /**
     * Check one row and work out what would happen to it.
     *
     * @param stdClass $certification
     * @param stdClass|null $source manual assignment source, null if users cannot be assigned
     * @param array $row raw values
     * @param array $columns column index => column value
     * @param stdClass $options skip flags, assign flags and default evidence
     * @param array $seen users and periods found in earlier rows, updated
     * @return stdClass keys: result, message, identifier, userid, assign, timefrom, timeuntil, timecertified, evidence
     */
    public static function check_row(
        stdClass $certification,
        ?stdClass $source,
        array $row,
        array $columns,
        stdClass $options,
        array &$seen
    ): stdClass {
        global $DB, $CFG;

        $outcome = (object)[
            'result' => self::RESULT_ERROR,
            'message' => '',
            'identifier' => '',
            'userid' => null,
            'assign' => false,
            'timefrom' => null,
            'timeuntil' => null,
            'timecertified' => null,
            'evidence' => '',
        ];

        $values = [];
        foreach ($columns as $index => $column) {
            if ($column === self::COLUMN_IGNORE) {
                continue;
            }
            $values[$column] = isset($row[$index]) ? trim((string)$row[$index]) : '';
        }

        $identifiers = array_filter(array_intersect_key($values, array_flip(self::USER_COLUMNS)), fn($v) => $v !== '');
        $outcome->identifier = implode(', ', $identifiers);
        if (!$identifiers) {
            return self::outcome($outcome, !empty($options->skipinvalid), 'history_upload_error_nouservalue');
        }

        // Every given user column must point at the same single user.
        $found = null;
        foreach ($identifiers as $field => $value) {
            $select = $DB->sql_equal($field, ':value', $field !== 'email');
            $select .= ' AND deleted = 0 AND confirmed = 1 AND id <> :guestid';
            $params = ['value' => $value, 'guestid' => $CFG->siteguest];
            if ($field === 'username') {
                $select .= ' AND mnethostid = :mnethostid';
                $params['mnethostid'] = $CFG->mnet_localhost_id;
                $params['value'] = \core_text::strtolower($value);
            }
            $users = $DB->get_records_select('user', $select, $params, 'id ASC', 'id', 0, 2);
            if (!$users) {
                return self::outcome($outcome, !empty($options->skipmissing), 'history_upload_error_missing', $value);
            }
            if (count($users) > 1) {
                return self::outcome($outcome, !empty($options->skipambiguous), 'history_upload_error_ambiguous', $value);
            }
            $user = reset($users);
            if ($found && $found->id != $user->id) {
                return self::outcome($outcome, !empty($options->skipambiguous), 'history_upload_error_ambiguous', $value);
            }
            $found = $user;
        }
        $outcome->userid = (int)$found->id;

        // Certification date defaults to the start of the period.
        $dates = ['timefrom' => $values['timefrom'], 'timeuntil' => $values['timeuntil']];
        $dates['timecertified'] = ($values['timecertified'] ?? '') !== '' ? $values['timecertified'] : $values['timefrom'];
        foreach ($dates as $name => $value) {
            if ($value === '') {
                return self::outcome($outcome, !empty($options->skipinvalid), 'history_upload_error_nodate');
            }
            $time = strtotime($value);
            if ($time === false) {
                return self::outcome($outcome, !empty($options->skipinvalid), 'history_upload_error_date', $value);
            }
            $outcome->$name = $time;
        }
        if ($outcome->timefrom > time() || $outcome->timecertified > time()) {
            return self::outcome($outcome, !empty($options->skipinvalid), 'history_upload_error_future');
        }
        if ($outcome->timefrom >= $outcome->timeuntil || $outcome->timeuntil <= $outcome->timecertified) {
            return self::outcome($outcome, !empty($options->skipinvalid), 'history_upload_error_dateorder');
        }

        $periodkey = $outcome->userid . '/' . $outcome->timefrom . '/' . $outcome->timeuntil;
        $params = [
            'certificationid' => $certification->id,
            'userid' => $outcome->userid,
            'timerevoked' => null,
            'timefrom' => $outcome->timefrom,
            'timeuntil' => $outcome->timeuntil,
        ];
        if (isset($seen['periods'][$periodkey]) || $DB->record_exists('tool_mucertify_period', $params)) {
            return self::outcome($outcome, !empty($options->skipexisting), 'history_upload_error_existing');
        }

        $params = ['certificationid' => $certification->id, 'userid' => $outcome->userid];
        $assigned = $DB->record_exists('tool_mucertify_assignment', $params);
        $assign = !empty($options->assign) && $source;
        if ($assigned) {
            if ($assign && !empty($options->skipassigned)) {
                // Requested by the manager, it is not a problem.
                return self::outcome($outcome, true, 'history_upload_error_assigned');
            }
        } else if (!isset($seen['assign'][$outcome->userid])) {
            if (!$assign) {
                return self::outcome($outcome, !empty($options->skipnotassigned), 'history_upload_error_notassigned');
            }
            $outcome->assign = true;
            $seen['assign'][$outcome->userid] = true;
        }
        $seen['periods'][$periodkey] = true;

        if (($values['evidence'] ?? '') !== '') {
            $outcome->evidence = $values['evidence'];
        } else {
            $outcome->evidence = trim($options->evidencedefault ?? '');
        }

        $outcome->result = self::RESULT_IMPORTED;
        return $outcome;
    }

    /**
     * Check all rows without changing anything.
     *
     * @param stdClass $certification
     * @param stdClass|null $source manual assignment source, null if users cannot be assigned
     * @param stdClass $csvdata rows and columns of the upload
     * @param stdClass $options
     * @return array list of outcomes, one per data row
     */
    public static function check(stdClass $certification, ?stdClass $source, stdClass $csvdata, stdClass $options): array {
        $outcomes = [];
        $seen = ['assign' => [], 'periods' => []];
        foreach (self::get_data_rows($csvdata) as $row) {
            $outcomes[] = self::check_row($certification, $source, $row, $csvdata->columns['map'], $options, $seen);
        }
        return $outcomes;
    }

    /**
     * Import the periods of rows that passed the check.
     *
     * Nothing is written when any row failed, the manager has to resolve it or skip it.
     *
     * @param stdClass $certification
     * @param stdClass|null $source manual assignment source, null if users cannot be assigned
     * @param stdClass $csvdata rows and columns of the upload
     * @param stdClass $options
     * @return array counts keyed by result plus number of new assignments
     */
    public static function import(stdClass $certification, ?stdClass $source, stdClass $csvdata, stdClass $options): array {
        global $DB;

        $outcomes = self::check($certification, $source, $csvdata, $options);
        $counts = [self::RESULT_IMPORTED => 0, self::RESULT_SKIPPED => 0, self::RESULT_ERROR => 0, 'assigned' => 0];
        foreach ($outcomes as $outcome) {
            $counts[$outcome->result]++;
        }
        if ($counts[self::RESULT_ERROR]) {
            return $counts;
        }

        foreach ($outcomes as $outcome) {
            if ($outcome->result !== self::RESULT_IMPORTED) {
                continue;
            }
            if ($outcome->assign) {
                source\manual::assign_users($certification->id, $source->id, [$outcome->userid], ['noperiod' => 1]);
                $counts['assigned']++;
            }
            $assignment = $DB->get_record(
                'tool_mucertify_assignment',
                ['certificationid' => $certification->id, 'userid' => $outcome->userid],
                '*',
                MUST_EXIST
            );
            period::add((object)[
                'certificationid' => $certification->id,
                'userid' => $outcome->userid,
                'programid' => null,
                'timecertified' => $outcome->timecertified,
                'timewindowstart' => $outcome->timefrom,
                'timefrom' => $outcome->timefrom,
                'timeuntil' => $outcome->timeuntil,
                'evidencedetails' => $outcome->evidence,
            ]);
            if ($outcome->assign) {
                // New periods are created as non-recertifiable.
                period::update_recertifiable($assignment, true);
            }
        }

        return $counts;
    }

    /**
     * Mark the outcome as skipped or failed.
     *
     * @param stdClass $outcome
     * @param bool $skip
     * @param string $errorcode
     * @param string|null $a
     * @return stdClass
     */
    private static function outcome(stdClass $outcome, bool $skip, string $errorcode, ?string $a = null): stdClass {
        $outcome->result = $skip ? self::RESULT_SKIPPED : self::RESULT_ERROR;
        $outcome->message = get_string($errorcode, 'tool_mucertify', $a);
        return $outcome;
    }

    /**
     * Does the first row look like column names rather than data?
     *
     * @param array $row first row of the data
     * @return bool
     */
    public static function guess_headers(array $row): bool {
        foreach ($row as $header) {
            if (self::guess_column((string)$header) !== self::COLUMN_IGNORE) {
                return true;
            }
        }
        return false;
    }

    /**
     * Guess the meaning of each column.
     *
     * Headers name the columns, only the first column that identifies users is used.
     * Without headers a column of email addresses identifies users, otherwise the first column.
     *
     * @param array $rows all rows of the data
     * @param bool $headers true if the first row holds column names
     * @return array column index => column value
     */
    public static function guess_columns(array $rows, bool $headers): array {
        $first = $rows[0];
        $guesses = array_fill_keys(array_keys($first), self::COLUMN_IGNORE);

        if ($headers) {
            $used = [];
            $useridentified = false;
            foreach ($first as $index => $header) {
                $guess = self::guess_column((string)$header);
                if ($guess === self::COLUMN_IGNORE || isset($used[$guess])) {
                    continue;
                }
                if (in_array($guess, self::USER_COLUMNS, true)) {
                    if ($useridentified) {
                        continue;
                    }
                    $useridentified = true;
                }
                $used[$guess] = true;
                $guesses[$index] = $guess;
            }
            return $guesses;
        }

        foreach (array_keys($first) as $index) {
            $values = array_filter(array_column($rows, $index), fn($v) => trim((string)$v) !== '');
            if ($values && count(array_filter($values, fn($v) => str_contains((string)$v, '@'))) === count($values)) {
                $guesses[$index] = 'email';
                return $guesses;
            }
        }
        $guesses[array_key_first($first)] = 'username';
        return $guesses;
    }

    /**
     * Guess the meaning of one column from its header.
     *
     * @param string $header
     * @return string column value
     */
    private static function guess_column(string $header): string {
        return match (\tool_mulib\local\import_util::normalise_header($header)) {
            'username', 'login' => 'username',
            'email', 'emailaddress', 'mail' => 'email',
            'idnumber' => 'idnumber',
            'timefrom', 'from', 'validfrom', 'start' => 'timefrom',
            'timeuntil', 'until', 'expiration', 'expires', 'validuntil' => 'timeuntil',
            'timecertified', 'certified', 'certificationdate' => 'timecertified',
            'evidence', 'evidencedetails', 'details' => 'evidence',
            default => self::COLUMN_IGNORE,
        };
    }
}
