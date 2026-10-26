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

namespace tool_mucertify\phpunit\local\source;

use tool_mucertify\local\source\manual;
use tool_mucertify\local\source\manual_upload;
use tool_muprog\local\program;

/**
 * Assignment upload tests.
 *
 * @group      MuTMS
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_mucertify\local\source\manual_upload
 */
final class manual_upload_test extends \advanced_testcase {
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Options with everything skipped or not.
     *
     * @param bool $skip
     * @return \stdClass
     */
    private function get_options(bool $skip): \stdClass {
        $options = [];
        foreach (manual_upload::get_option_names() as $name) {
            $options[$name] = (int)$skip;
        }
        return (object)$options;
    }

    /**
     * Data that passed the columns stage.
     *
     * @param array $rows
     * @param array $map
     * @param bool $headers
     * @return \stdClass
     */
    private function csvdata(array $rows, array $map, bool $headers = false): \stdClass {
        $csvdata = manual_upload::validate(['rows' => $rows, 'columns' => ['headers' => $headers, 'map' => $map]]);
        $this->assertNotEmpty($csvdata->columns);
        return $csvdata;
    }

    public function test_wizard_state_and_stages(): void {
        $this->setAdminUser();
        $rows = [['username', 'timeuntil'], ['user1', '']];

        $delimiter = \tool_mulib\local\import_util::DELIMITER_AUTO;
        $csvdata = manual_upload::save_source("username,timeuntil\nuser1,", 'UTF-8', $delimiter);
        $this->assertSame($rows, $csvdata->rows);
        $this->assertTrue(manual_upload::is_columns_stage($csvdata));
        $this->assertTrue(manual_upload::guess_headers($rows[0]));
        $this->assertSame(['username', 'timeuntil'], manual_upload::guess_columns($rows, true));
        $this->assertSame(
            ['username', 'timewindowstart', 'timewindowdue', 'timewindowend', 'timecertifiedtemp'],
            manual_upload::guess_columns([['username', 'timewindowstart', 'timewindowdue', 'timewindowend', 'timetemp']], true)
        );

        $csvdata = manual_upload::save_columns($csvdata, (object)['headers' => 1, 'column_0' => 'username', 'column_1' => 'timeuntil']);
        $this->assertFalse(manual_upload::is_columns_stage($csvdata));
        $this->assertTrue(manual_upload::is_options_stage($csvdata));
        $csvdata = manual_upload::save_options($csvdata, (object)['skipassigned' => 1]);
        $this->assertFalse(manual_upload::is_options_stage($csvdata));
        $this->assertEquals($csvdata, manual_upload::validate(json_decode(json_encode($csvdata), true)));

        $this->assertSame(
            ['column_0' => 'source_manual_upload_error_nouser'],
            manual_upload::check_columns($rows, ['headers' => true, 'map' => ['', 'timeuntil']])
        );
        $this->assertSame(
            ['column_1' => 'source_manual_upload_error_columntwice'],
            manual_upload::check_columns($rows, ['headers' => true, 'map' => ['email', 'email']])
        );
    }

    public function test_import_with_dates(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $admin = get_admin();
        $this->setUser($admin);

        $admin = get_admin();
        $user1 = $this->getDataGenerator()->create_user(['username' => 'user1', 'email' => 'user1@example.com', 'idnumber' => 'u1']);
        $user2 = $this->getDataGenerator()->create_user(['username' => 'user2', 'email' => 'user2@example.com', 'idnumber' => 'u2']);
        $user3 = $this->getDataGenerator()->create_user(['username' => 'user3', 'email' => 'user3@example.com', 'idnumber' => 'u3']);
        $user4 = $this->getDataGenerator()->create_user(['username' => 'user4', 'email' => 'user4@example.com', 'idnumber' => 'u4']);
        $user5 = $this->getDataGenerator()->create_user(['username' => 'user5', 'email' => 'user5@example.com', 'idnumber' => 'u5']);
        $user6 = $this->getDataGenerator()->create_user(['username' => 'user6', 'email' => 'user6@example.com', 'idnumber' => 'u6']);

        $program1 = $programgenerator->create_program(['sources' => ['mucertify' => []]]);
        $program2 = $programgenerator->create_program(['sources' => ['mucertify' => []]]);

        $timestart = time();

        $pdata = (object)[
            'id' => $program1->id,
            'programstart_type' => 'date',
            'programstart_date' => $timestart,
            'programdue_type' => 'date',
            'programdue_date' => $timestart + (20 * 60 * 60 * 24),
            'programend_type' => 'date',
            'programend_date' => $timestart + (30 * 60 * 60 * 24),
        ];
        $program1 = program::update_scheduling($pdata);

        $certification1 = $generator->create_certification([
            'sources' => ['manual' => []],
            'programid1' => $program1->id,
        ]);
        $source1 = $DB->get_record(
            'tool_mucertify_source',
            ['type' => 'manual', 'certificationid' => $certification1->id],
            '*',
            MUST_EXIST
        );

        $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user5->id]);

        $timestart2 = new \DateTime('@' . ($timestart - (10 * 60 * 60 * 24)));
        $timedue3 = new \DateTime('@' . ($timestart + (1 * 60 * 60 * 24)));
        $timeend3 = new \DateTime('@' . ($timestart + (2 * 60 * 60 * 24)));
        $timetemp6 = new \DateTime('@' . ($timestart + (10 * 60 * 60 * 24)));
        $csvdata = [
            ['u1', '', '', '', ''],
            ['u2', $timestart2->format(\DateTime::ATOM), '', '', ''],
            ['u3', '', $timedue3->format(\DateTime::ATOM), $timeend3->format(\DateTime::COOKIE), ''],
            ['u4', 'abc', '', '', ''],
            ['u5', '', '', '', ''],
            ['u6', '', '', '', $timetemp6->format(\DateTime::W3C)],
        ];
        $csvdata = $this->csvdata($csvdata, ['idnumber', 'timewindowstart', 'timewindowdue', 'timewindowend', 'timecertifiedtemp']);

        // Problems stop the upload.
        $result = manual_upload::import($certification1, $source1, $csvdata, $this->get_options(false));
        $this->assertSame([manual_upload::RESULT_ASSIGNED => 4, manual_upload::RESULT_SKIPPED => 0, manual_upload::RESULT_ERROR => 2], $result);
        $this->assertSame(1, $DB->count_records('tool_mucertify_assignment', ['certificationid' => $certification1->id]));

        $this->setCurrentTimeStart();
        $result = manual_upload::import($certification1, $source1, $csvdata, $this->get_options(true));
        $this->assertSame([manual_upload::RESULT_ASSIGNED => 4, manual_upload::RESULT_SKIPPED => 2, manual_upload::RESULT_ERROR => 0], $result);

        $period1 = $DB->get_record('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user1->id], '*', MUST_EXIST);
        $allocation1 = $DB->get_record('tool_muprog_allocation', ['programid' => $program1->id, 'userid' => $user1->id]);
        $this->assertTimeCurrent($allocation1->timestart);
        $this->assertEquals(null, $allocation1->timedue);
        $this->assertEquals(null, $allocation1->timeend);
        $assignment1 = $DB->get_record('tool_mucertify_assignment', ['certificationid' => $certification1->id, 'userid' => $user1->id]);
        $this->assertSame(null, $assignment1->timecertifiedtemp);

        $period2 = $DB->get_record('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user2->id], '*', MUST_EXIST);
        $allocation2 = $DB->get_record('tool_muprog_allocation', ['programid' => $program1->id, 'userid' => $user2->id]);
        $this->assertEquals($timestart2->getTimestamp(), $allocation2->timestart);
        $this->assertEquals(null, $allocation2->timedue);
        $this->assertEquals(null, $allocation2->timeend);
        $assignment2 = $DB->get_record('tool_mucertify_assignment', ['certificationid' => $certification1->id, 'userid' => $user2->id]);
        $this->assertSame(null, $assignment2->timecertifiedtemp);

        $period3 = $DB->get_record('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user3->id], '*', MUST_EXIST);
        $allocation3 = $DB->get_record('tool_muprog_allocation', ['programid' => $program1->id, 'userid' => $user3->id]);
        $this->assertTimeCurrent($allocation3->timestart);
        $this->assertEquals($timedue3->getTimestamp(), $allocation3->timedue);
        $this->assertEquals($timeend3->getTimestamp(), $allocation3->timeend);
        $assignment3 = $DB->get_record('tool_mucertify_assignment', ['certificationid' => $certification1->id, 'userid' => $user3->id]);
        $this->assertSame(null, $assignment3->timecertifiedtemp);

        $period6 = $DB->get_record('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user6->id], '*', MUST_EXIST);
        $allocation6 = $DB->get_record('tool_muprog_allocation', ['programid' => $program1->id, 'userid' => $user6->id]);
        $this->assertTimeCurrent($allocation6->timestart);
        $this->assertEquals(null, $allocation6->timedue);
        $this->assertEquals(null, $allocation6->timeend);
        $assignment6 = $DB->get_record('tool_mucertify_assignment', ['certificationid' => $certification1->id, 'userid' => $user6->id]);
        $this->assertEquals($timetemp6->getTimestamp(), $assignment6->timecertifiedtemp);
    }
}
