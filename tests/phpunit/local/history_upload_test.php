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
// phpcs:disable moodle.Commenting.DocblockDescription.Missing

namespace tool_mucertify\phpunit\local;

use tool_mucertify\local\history_upload;
use tool_mucertify\local\source\manual;

/**
 * Certification history upload tests.
 *
 * @group      MuTMS
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_mucertify\local\history_upload
 */
final class history_upload_test extends \advanced_testcase {
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Options with everything skipped or not.
     *
     * @param bool $skip
     * @param array $extra
     * @return \stdClass
     */
    private function get_options(bool $skip, array $extra = []): \stdClass {
        $options = [];
        foreach (array_keys(history_upload::get_skip_menu()) as $name) {
            $options[$name] = (int)$skip;
        }
        $options['assign'] = 0;
        $options['skipassigned'] = 0;
        $options['evidencedefault'] = 'history upload';
        return (object)array_merge($options, $extra);
    }

    /**
     * Data that passed the columns stage.
     *
     * @param array $rows
     * @param array $map
     * @param bool $headers
     * @return \stdClass
     */
    private function csvdata(array $rows, array $map, bool $headers): \stdClass {
        $csvdata = history_upload::validate(['rows' => $rows, 'columns' => ['headers' => $headers, 'map' => $map]]);
        $this->assertNotEmpty($csvdata->columns);
        return $csvdata;
    }

    public function test_wizard_state_and_stages(): void {
        $this->setAdminUser();
        $rows = [['username', 'from', 'expiration'], ['user1', '2020-01-01', '2020-03-31']];

        $delimiter = \tool_mulib\local\import_util::DELIMITER_AUTO;
        $csvdata = history_upload::save_source("username,from,expiration\nuser1,2020-01-01,2020-03-31", 'UTF-8', $delimiter);
        $this->assertSame($rows, $csvdata->rows);
        $this->assertTrue(history_upload::is_columns_stage($csvdata));
        $this->assertSame(['username', 'timefrom', 'timeuntil'], history_upload::guess_columns($rows, true));

        // Both period dates are required.
        $this->assertSame(
            ['column_0' => 'history_upload_error_nodatecolumns'],
            history_upload::check_columns($rows, ['headers' => true, 'map' => ['username', 'timefrom', '']])
        );

        $csvdata = history_upload::save_columns($csvdata, (object)['headers' => 1, 'column_0' => 'username', 'column_1' => 'timefrom', 'column_2' => 'timeuntil']);
        $this->assertFalse(history_upload::is_columns_stage($csvdata));
        $this->assertTrue(history_upload::is_options_stage($csvdata));

        // The default evidence is required.
        $csvdata = history_upload::save_options($csvdata, (object)['assign' => 1, 'evidencedefault' => '']);
        $this->assertTrue(history_upload::is_options_stage($csvdata));
        $csvdata = history_upload::save_options($csvdata, (object)['assign' => 1, 'evidencedefault' => 'Some evidence']);
        $this->assertFalse(history_upload::is_options_stage($csvdata));
        $this->assertSame(1, $csvdata->options['assign']);
        $this->assertSame(0, $csvdata->options['skipassigned']);
        $this->assertEquals($csvdata, history_upload::validate(json_decode(json_encode($csvdata), true)));
    }

    public function test_import(): void {
        global $DB;
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $now = time();

        $user1 = $this->getDataGenerator()->create_user(
            ['email' => 'user1@example.com', 'username' => 'user1', 'idnumber' => 'iduser1']
        );
        $user2 = $this->getDataGenerator()->create_user(
            ['email' => 'user2@example.com', 'username' => 'user2', 'idnumber' => 'iduser2']
        );
        $user3 = $this->getDataGenerator()->create_user(
            ['email' => 'user3@example.com', 'username' => 'user3', 'idnumber' => 'iduser3']
        );
        $user4 = $this->getDataGenerator()->create_user(
            ['email' => 'user4@example.com', 'username' => 'user4']
        );
        $user5 = $this->getDataGenerator()->create_user(
            ['email' => 'user5@example.com', 'username' => 'user5']
        );
        $user5x = $this->getDataGenerator()->create_user(
            ['email' => 'user5@example.com', 'username' => 'user5x']
        ); // Duplicate email test.

        $program1 = $programgenerator->create_program(['sources' => 'mucertify']);
        $program2 = $programgenerator->create_program(['sources' => 'mucertify']);

        $data = [
            'sources' => ['manual' => []],
            'programid1' => $program1->id,
            'valid1' => \tool_mucertify\local\certification::SINCE_CERTIFIED,
            'expiration1' => ['since' => \tool_mucertify\local\certification::SINCE_WINDOWSTART, 'delay' => 'P90D'],
            'recertify' => null,
        ];
        $certification1 = $generator->create_certification($data);
        $source1 = $DB->get_record(
            'tool_mucertify_source',
            ['type' => 'manual', 'certificationid' => $certification1->id],
            '*',
            MUST_EXIST
        );

        $data = [
            'sources' => ['manual' => []],
            'programid1' => $program1->id,
            'valid1' => \tool_mucertify\local\certification::SINCE_CERTIFIED,
            'expiration1' => ['since' => \tool_mucertify\local\certification::SINCE_WINDOWSTART, 'delay' => 'P90D'],
            'programid2' => $program2->id,
            'valid2' => \tool_mucertify\local\certification::SINCE_CERTIFIED,
            'expiration2' => ['since' => \tool_mucertify\local\certification::SINCE_WINDOWSTART, 'delay' => 'P90D'],
            'recertify' => DAYSECS,
        ];
        $certification2 = $generator->create_certification($data);
        $source2 = $DB->get_record(
            'tool_mucertify_source',
            ['type' => 'manual', 'certificationid' => $certification2->id],
            '*',
            MUST_EXIST
        );

        manual::assign_users($certification1->id, $source1->id, [$user1->id]);
        $period1x0 = $DB->get_record('tool_mucertify_period', ['userid' => $user1->id, 'certificationid' => $certification1->id]);
        manual::assign_users($certification1->id, $source1->id, [$user2->id], ['noperiod' => true]);
        manual::assign_users($certification1->id, $source1->id, [$user5->id], ['noperiod' => true]);

        // Only assigned users tests.

        $map = ['username', 'timefrom', 'timeuntil', 'timecertified', 'evidence'];
        $headers = true;
        $options = $this->get_options(true);
        $filedata = [
            ['username', 'from', 'until', 'certified', 'evidence'],
            ['user1', '2020-01-01', '2020-03-31', '2020-01-01', 'ext program X passed'],
            ['user1', '2020-01-04', '2020-06-30', '2020-03-30', ''], // Use default evidence text.
            ['user2', '2021-01-01', '2021-03-31', '2021-01-02', 'ext program Y passed'],
            ['user3', '2022-01-01', '2022-03-31', '2022-01-01', 'ext program X passed'], // Not assigned skipped.
            ['userz', '2020-01-01', '2020-03-31', '2020-01-01', 'ext program X passed'], // Unknown user error.
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 3, history_upload::RESULT_SKIPPED => 2, history_upload::RESULT_ERROR => 0, 'assigned' => 0], $result);
        $this->assertCount(3, $DB->get_records('tool_mucertify_period', ['userid' => $user1->id, 'certificationid' => $certification1->id]));
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]));
        $this->assertCount(0, $DB->get_records('tool_mucertify_period', ['userid' => $user3->id, 'certificationid' => $certification1->id]));
        $period2x1 = $DB->get_record('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]);
        $this->assertSame($certification1->id, $period2x1->certificationid);
        $this->assertSame($user2->id, $period2x1->userid);
        $this->assertSame(null, $period2x1->programid);
        $this->assertSame($period2x1->timefrom, $period2x1->timewindowstart);
        $this->assertSame(null, $period2x1->timewindowdue);
        $this->assertSame(null, $period2x1->timewindowend);
        $this->assertSame(null, $period2x1->allocationid);
        $this->assertSame((string)strtotime('2021-01-02'), $period2x1->timecertified);
        $this->assertSame((string)strtotime('2021-01-01'), $period2x1->timefrom);
        $this->assertSame((string)strtotime('2021-03-31'), $period2x1->timeuntil);
        $this->assertSame(null, $period2x1->timerevoked);
        $this->assertSame('{"details":"ext program Y passed"}', $period2x1->evidencejson);
        $this->assertSame('1', $period2x1->first);
        $this->assertSame('1', $period2x1->recertifiable);
        $periods = $DB->get_records('tool_mucertify_period', ['userid' => $user1->id, 'certificationid' => $certification1->id], 'timewindowstart ASC');
        [$period1x1, $period1x2, $period1x3] = array_values($periods);
        $this->assertSame($certification1->id, $period1x1->certificationid);
        $this->assertSame($user1->id, $period1x1->userid);
        $this->assertSame(null, $period1x1->programid);
        $this->assertSame($period1x1->timefrom, $period1x1->timewindowstart);
        $this->assertSame(null, $period1x1->timewindowdue);
        $this->assertSame(null, $period1x1->timewindowend);
        $this->assertSame(null, $period1x1->allocationid);
        $this->assertSame((string)strtotime('2020-01-01'), $period1x1->timecertified);
        $this->assertSame((string)strtotime('2020-01-01'), $period1x1->timefrom);
        $this->assertSame((string)strtotime('2020-03-31'), $period1x1->timeuntil);
        $this->assertSame(null, $period1x1->timerevoked);
        $this->assertSame('{"details":"ext program X passed"}', $period1x1->evidencejson);
        $this->assertSame('1', $period1x1->first);
        $this->assertSame('0', $period1x1->recertifiable);
        $this->assertSame($certification1->id, $period1x2->certificationid);
        $this->assertSame($user1->id, $period1x2->userid);
        $this->assertSame(null, $period1x2->programid);
        $this->assertSame($period1x2->timefrom, $period1x2->timewindowstart);
        $this->assertSame(null, $period1x2->timewindowdue);
        $this->assertSame(null, $period1x2->timewindowend);
        $this->assertSame(null, $period1x2->allocationid);
        $this->assertSame((string)strtotime('2020-03-30'), $period1x2->timecertified);
        $this->assertSame((string)strtotime('2020-01-04'), $period1x2->timefrom);
        $this->assertSame((string)strtotime('2020-06-30'), $period1x2->timeuntil);
        $this->assertSame(null, $period1x2->timerevoked);
        $this->assertSame('{"details":"history upload"}', $period1x2->evidencejson);
        $this->assertSame('0', $period1x2->first);
        $this->assertSame('0', $period1x2->recertifiable);
        $period1x0->first = '0';
        $this->assertSame((array)$period1x0, (array)$period1x3);

        // Skip duplicate data.
        $filedata = [
            ['username', 'from', 'until', 'certified', 'evidence'],
            ['user1', '2020-01-01', '2020-03-31', '2020-01-01', 'ext program X passed'],
            ['user1', '2020-01-04', '2020-06-30', '2020-03-30', ''], // Use default evidence text.
            ['user2', '2021-01-01', '2021-03-31', '2021-01-02', 'ext program Y passed'],
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 0, history_upload::RESULT_SKIPPED => 3, history_upload::RESULT_ERROR => 0, 'assigned' => 0], $result);

        // Errors for invalid data.
        $filedata = [
            ['username', 'from', 'until', 'certified', 'evidence'],
            ['user2', 'xyz', 'zyq', 'xyz', 'ext program X passed'], // Invalid date format.
            ['user2', '2032-01-01', '2032-03-31', '2032-01-01', 'ext program X passed'], // Future date error.
            ['user2', '2019-01-01', '2019-03-31', '', 'ext program X passed'], // No certification date error.
            ['user2', '', '2019-03-31', '2019-01-01', 'ext program X passed'], // No start date error.
            ['user2', '2019-01-01', '', '2019-01-01', 'ext program X passed'], // No end date error.
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $this->get_options(false));
        $this->assertSame([history_upload::RESULT_IMPORTED => 1, history_upload::RESULT_SKIPPED => 0, history_upload::RESULT_ERROR => 4, 'assigned' => 0], $result);

        // Duplicate emails.
        $map = ['email', 'timefrom', 'timeuntil'];
        $headers = false;
        $filedata = [
            ['user2@example.com', '2022-01-01', '2022-03-31'],
            ['user5@example.com', '2022-01-01', '2022-03-31'],
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 1, history_upload::RESULT_SKIPPED => 1, history_upload::RESULT_ERROR => 0, 'assigned' => 0], $result);
        $this->assertCount(3, $DB->get_records('tool_mucertify_period', ['userid' => $user1->id, 'certificationid' => $certification1->id]));
        $this->assertCount(2, $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]));
        $this->assertCount(0, $DB->get_records('tool_mucertify_period', ['userid' => $user5->id, 'certificationid' => $certification1->id]));
        $periods = $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id], 'timewindowstart ASC');
        [$period2x1, $period2x2] = array_values($periods);
        $this->assertSame($certification1->id, $period2x2->certificationid);
        $this->assertSame($user2->id, $period2x2->userid);
        $this->assertSame(null, $period2x2->programid);
        $this->assertSame($period2x2->timefrom, $period2x2->timewindowstart);
        $this->assertSame(null, $period2x2->timewindowdue);
        $this->assertSame(null, $period2x2->timewindowend);
        $this->assertSame(null, $period2x2->allocationid);
        $this->assertSame((string)strtotime('2022-01-01'), $period2x2->timecertified);
        $this->assertSame((string)strtotime('2022-01-01'), $period2x2->timefrom);
        $this->assertSame((string)strtotime('2022-03-31'), $period2x2->timeuntil);
        $this->assertSame(null, $period2x2->timerevoked);
        $this->assertSame('{"details":"history upload"}', $period2x2->evidencejson);
        $this->assertSame('0', $period2x2->first);
        $this->assertSame('1', $period2x2->recertifiable);

        // ID number mapping.
        $map = ['idnumber', 'timefrom', 'timeuntil'];
        $headers = false;
        $filedata = [
            ['iduser2', '2023-01-01', '2023-03-31'],
            ['iduserz', '2023-01-01', '2023-03-31'],
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 1, history_upload::RESULT_SKIPPED => 1, history_upload::RESULT_ERROR => 0, 'assigned' => 0], $result);
        $this->assertCount(3, $DB->get_records('tool_mucertify_period', ['userid' => $user1->id, 'certificationid' => $certification1->id]));
        $this->assertCount(3, $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]));
        $this->assertCount(0, $DB->get_records('tool_mucertify_period', ['userid' => $user5->id, 'certificationid' => $certification1->id]));
        $periods = $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id], 'timewindowstart ASC');
        [$period2x1, $period2x2, $period2x3] = array_values($periods);
        $this->assertSame($certification1->id, $period2x3->certificationid);
        $this->assertSame($user2->id, $period2x3->userid);
        $this->assertSame(null, $period2x3->programid);
        $this->assertSame($period2x3->timefrom, $period2x3->timewindowstart);
        $this->assertSame(null, $period2x3->timewindowdue);
        $this->assertSame(null, $period2x3->timewindowend);
        $this->assertSame(null, $period2x3->allocationid);
        $this->assertSame((string)strtotime('2023-01-01'), $period2x3->timecertified);
        $this->assertSame((string)strtotime('2023-01-01'), $period2x3->timefrom);
        $this->assertSame((string)strtotime('2023-03-31'), $period2x3->timeuntil);
        $this->assertSame(null, $period2x3->timerevoked);
        $this->assertSame('{"details":"history upload"}', $period2x3->evidencejson);
        $this->assertSame('0', $period2x3->first);
        $this->assertSame('1', $period2x3->recertifiable);

        // Assign new.
        $map = ['username', 'timefrom', 'timeuntil'];
        $headers = false;
        $options = $this->get_options(true, ['assign' => 1]);
        $filedata = [
            ['user2', '2019-01-01', '2019-03-31'],
            ['user3', '2019-01-01', '2019-03-31'],
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 2, history_upload::RESULT_SKIPPED => 0, history_upload::RESULT_ERROR => 0, 'assigned' => 1], $result);
        $this->assertCount(4, $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]));
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['userid' => $user3->id, 'certificationid' => $certification1->id]));
        $periods = $DB->get_records('tool_mucertify_period', ['userid' => $user3->id, 'certificationid' => $certification1->id], 'timewindowstart ASC');
        [$period3x1] = array_values($periods);
        $this->assertSame($certification1->id, $period3x1->certificationid);
        $this->assertSame($user3->id, $period3x1->userid);
        $this->assertSame(null, $period3x1->programid);
        $this->assertSame($period3x1->timefrom, $period3x1->timewindowstart);
        $this->assertSame(null, $period3x1->timewindowdue);
        $this->assertSame(null, $period3x1->timewindowend);
        $this->assertSame(null, $period3x1->allocationid);
        $this->assertSame((string)strtotime('2019-01-01'), $period3x1->timecertified);
        $this->assertSame((string)strtotime('2019-01-01'), $period3x1->timefrom);
        $this->assertSame((string)strtotime('2019-03-31'), $period3x1->timeuntil);
        $this->assertSame(null, $period3x1->timerevoked);
        $this->assertSame('{"details":"history upload"}', $period3x1->evidencejson);
        $this->assertSame('1', $period3x1->first);
        $this->assertSame('0', $period3x1->recertifiable);

        // Assign new and skip existing.
        $options = $this->get_options(true, ['assign' => 1, 'skipassigned' => 1]);
        $filedata = [
            ['user2', '2019-01-01', '2019-03-31'],
            ['user4', '2019-01-01', '2019-03-31'],
        ];
        $result = history_upload::import($certification1, $source1, $this->csvdata($filedata, $map, $headers), $options);
        $this->assertSame([history_upload::RESULT_IMPORTED => 1, history_upload::RESULT_SKIPPED => 1, history_upload::RESULT_ERROR => 0, 'assigned' => 1], $result);
        $this->assertCount(4, $DB->get_records('tool_mucertify_period', ['userid' => $user2->id, 'certificationid' => $certification1->id]));
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['userid' => $user4->id, 'certificationid' => $certification1->id]));
        $periods = $DB->get_records('tool_mucertify_period', ['userid' => $user4->id, 'certificationid' => $certification1->id], 'timewindowstart ASC');
        [$period4x1] = array_values($periods);
        $this->assertSame($certification1->id, $period4x1->certificationid);
        $this->assertSame($user4->id, $period4x1->userid);
        $this->assertSame(null, $period4x1->programid);
        $this->assertSame($period4x1->timefrom, $period4x1->timewindowstart);
        $this->assertSame(null, $period4x1->timewindowdue);
        $this->assertSame(null, $period4x1->timewindowend);
        $this->assertSame(null, $period4x1->allocationid);
        $this->assertSame((string)strtotime('2019-01-01'), $period4x1->timecertified);
        $this->assertSame((string)strtotime('2019-01-01'), $period4x1->timefrom);
        $this->assertSame((string)strtotime('2019-03-31'), $period4x1->timeuntil);
        $this->assertSame(null, $period4x1->timerevoked);
        $this->assertSame('{"details":"history upload"}', $period4x1->evidencejson);
        $this->assertSame('1', $period4x1->first);
        $this->assertSame('0', $period4x1->recertifiable);
    }
}
