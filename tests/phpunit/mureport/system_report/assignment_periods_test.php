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

namespace tool_mucertify\phpunit\mureport\system_report;

use tool_mucertify\mureport\system_report\assignment_periods;
use tool_mucertify\mureport\system_report\user_assignment_periods;
use tool_mureport\mureport\request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

/**
 * Assignment periods reports tests.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversClass(assignment_periods::class)]
#[CoversClass(user_assignment_periods::class)]
#[CoversClass(\tool_mucertify\mureport\entity\period::class)]
#[Group('MuTMS')]
final class assignment_periods_test extends \advanced_testcase {
    #[\Override]
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Returns exported rows.
     *
     * @param string $classname
     * @param int $assignmentid
     * @return array
     */
    private function get_rows(string $classname, int $assignmentid): array {
        $report = $classname::make_instance($assignmentid);
        $report->require_access();
        return $report->get_query()->get_page(new request([]))->export_rows();
    }

    /**
     * Returns period statuses of report rows.
     *
     * @param string $classname
     * @param int $assignmentid
     * @return string[]
     */
    private function get_statuses(string $classname, int $assignmentid): array {
        return array_map(fn(array $row): string => strip_tags($row['cells']['period:status']), $this->get_rows($classname, $assignmentid));
    }

    /**
     * Create certification with two periods of user1 and one period of user2.
     *
     * @return array [certification, assignment1, assignment2, user1, user2]
     */
    private function create_data(): array {
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $program1 = $programgenerator->create_program(['idnumber' => 'P1', 'fullname' => 'Program 1']);
        $program2 = $programgenerator->create_program(['idnumber' => 'P2', 'fullname' => 'Program 2']);
        $certification = $generator->create_certification(['idnumber' => 'C1', 'fullname' => 'Alpha', 'program1' => 'P1', 'sources' => ['manual' => []]]);
        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $now = time();
        $assignment1 = $generator->create_certification_assignment(['certificationid' => $certification->id, 'userid' => $user1->id,
            'timewindowstart' => $now - DAYSECS]);
        $assignment2 = $generator->create_certification_assignment(['certificationid' => $certification->id, 'userid' => $user2->id,
            'timewindowstart' => $now - DAYSECS]);
        \tool_mucertify\local\period::add((object)[
            'assignmentid' => $assignment1->id,
            'programid' => $program2->id,
            'timewindowstart' => $now + DAYSECS * 10,
        ]);
        return [$certification, $assignment1, $assignment2, $user1, $user2];
    }

    public function test_assignment_periods(): void {
        global $DB;
        [$certification, $assignment1, $assignment2] = $this->create_data();

        $this->setAdminUser();
        $this->assertSame(['Pending', 'Future'], $this->get_statuses(assignment_periods::class, $assignment1->id));
        $this->assertSame(['Pending'], $this->get_statuses(assignment_periods::class, $assignment2->id));
        $rows = $this->get_rows(assignment_periods::class, $assignment1->id);
        $periodid = $DB->get_field('tool_mucertify_period', 'id', ['userid' => $assignment1->userid, 'programid' => $certification->programid1]);
        $this->assertStringContainsString('/admin/tool/mucertify/management/period.php?id=' . $periodid, $rows[0]['cells']['period:timewindowstart']);
        $this->assertStringContainsString('Program 2', $rows[1]['cells']['period:program']);

        $report = assignment_periods::make_instance($assignment1->id);
        $this->assertArrayNotHasKey('period:recertify', $report->get_columns());
        $DB->set_field('tool_mucertify_certification', 'recertify', DAYSECS, ['id' => $certification->id]);
        $report = assignment_periods::make_instance($assignment1->id);
        $this->assertArrayHasKey('period:recertify', $report->get_columns());

        $DB->set_field('tool_mucertify_assignment', 'archived', 1, ['id' => $assignment1->id]);
        $this->assertSame(['Archived', 'Archived'], $this->get_statuses(assignment_periods::class, $assignment1->id));

        $viewer = $this->getDataGenerator()->create_user();
        $this->setUser($viewer);
        try {
            $this->get_rows(assignment_periods::class, $assignment2->id);
            $this->fail('Exception expected');
        } catch (\core\exception\required_capability_exception $ex) {
            $this->assertInstanceOf(\core\exception\required_capability_exception::class, $ex);
        }
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:view', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $viewer->id, \context_system::instance()->id);
        $this->assertSame(['Pending'], $this->get_statuses(assignment_periods::class, $assignment2->id));

        $this->expectException(\core\exception\invalid_parameter_exception::class);
        assignment_periods::make_instance(-1)->require_access();
    }

    public function test_user_assignment_periods(): void {
        global $DB;
        [$certification, $assignment1, $assignment2, $user1, $user2] = $this->create_data();

        $this->setUser($user1);
        $this->assertSame(['Pending', 'Future'], $this->get_statuses(user_assignment_periods::class, $assignment1->id));
        $rows = $this->get_rows(user_assignment_periods::class, $assignment1->id);
        $this->assertStringNotContainsString('/management/period.php', $rows[0]['cells']['period:timewindowstart']);
        $this->assertSame('', $rows[0]['cells']['period:program']);
        try {
            $this->get_rows(user_assignment_periods::class, $assignment2->id);
            $this->fail('Exception expected');
        } catch (\core\exception\required_capability_exception $ex) {
            $this->assertInstanceOf(\core\exception\required_capability_exception::class, $ex);
        }

        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:viewusercertifications', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $user1->id, \context_user::instance($user2->id)->id);
        $this->assertSame(['Pending'], $this->get_statuses(user_assignment_periods::class, $assignment2->id));

        $DB->set_field('tool_mucertify_assignment', 'archived', 1, ['id' => $assignment2->id]);
        try {
            $this->get_rows(user_assignment_periods::class, $assignment2->id);
            $this->fail('Exception expected');
        } catch (\core\exception\invalid_parameter_exception $ex) {
            $this->assertInstanceOf(\core\exception\invalid_parameter_exception::class, $ex);
        }

        $DB->set_field('tool_mucertify_certification', 'archived', 1, ['id' => $certification->id]);
        $this->expectException(\core\exception\invalid_parameter_exception::class);
        $this->get_rows(user_assignment_periods::class, $assignment1->id);
    }
}
