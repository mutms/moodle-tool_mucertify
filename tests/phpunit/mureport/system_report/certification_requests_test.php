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

use tool_mucertify\mureport\system_report\certification_requests;
use tool_mureport\mureport\request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

/**
 * Certification requests report tests.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversClass(certification_requests::class)]
#[CoversClass(\tool_mucertify\mureport\entity\request::class)]
#[Group('MuTMS')]
final class certification_requests_test extends \advanced_testcase {
    #[\Override]
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Returns exported rows.
     *
     * @param int $certificationid
     * @param request $request
     * @return array
     */
    private function get_rows(int $certificationid, request $request = new request([])): array {
        $report = certification_requests::make_instance($certificationid);
        $report->require_access();
        return $report->get_query()->get_page($request)->export_rows();
    }

    /**
     * Returns user names and actions of report rows.
     *
     * @param int $certificationid
     * @param request $request
     * @return array name => action names
     */
    private function get_actions(int $certificationid, request $request = new request([])): array {
        $result = [];
        foreach ($this->get_rows($certificationid, $request) as $row) {
            $result[preg_replace('/^[A-Z]+(?=[A-Z])/', '', strip_tags($row['cells']['auser:fullname']))] = array_column($row['actions']['request:actions'] ?? [], 'name');
        }
        return $result;
    }

    public function test_rows(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $user1 = $this->getDataGenerator()->create_user(['firstname' => 'Anna', 'lastname' => 'Alpha']);
        $user2 = $this->getDataGenerator()->create_user(['firstname' => 'Bob', 'lastname' => 'Beta']);
        $user3 = $this->getDataGenerator()->create_user(['firstname' => 'Cyril', 'lastname' => 'Gamma']);
        $certification1 = $generator->create_certification(['idnumber' => 'C1', 'sources' => ['approval' => [], 'manual' => []]]);
        $certification2 = $generator->create_certification(['idnumber' => 'C2', 'sources' => ['approval' => []]]);
        $source1 = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification1->id, 'type' => 'approval'], '*', MUST_EXIST);
        $source2 = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification2->id, 'type' => 'approval'], '*', MUST_EXIST);
        $now = time();
        $DB->insert_record('tool_mucertify_request', ['sourceid' => $source1->id, 'userid' => $user1->id, 'timerequested' => $now - 300]);
        $DB->insert_record('tool_mucertify_request', ['sourceid' => $source1->id, 'userid' => $user2->id, 'timerequested' => $now - 200,
            'timerejected' => $now - 100]);
        $DB->insert_record('tool_mucertify_request', ['sourceid' => $source1->id, 'userid' => $user3->id, 'timerequested' => $now - 100]);
        $DB->insert_record('tool_mucertify_request', ['sourceid' => $source2->id, 'userid' => $user1->id, 'timerequested' => $now]);
        $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user3->id]);

        $this->setAdminUser();
        $this->assertSame([
            'Anna Alpha' => ['approve', 'reject'],
            'Bob Beta' => ['delete'],
            'Cyril Gamma' => ['reject', 'delete'],
        ], $this->get_actions($certification1->id));
        $this->assertSame(['Anna Alpha', 'Cyril Gamma'], array_keys($this->get_actions($certification1->id, new request(['request:status' => ['value' => 'pending']]))));
        $this->assertSame(['Bob Beta'], array_keys($this->get_actions($certification1->id, new request(['request:status' => ['value' => 'rejected']]))));
        $this->assertSame(['Anna Alpha'], array_keys($this->get_actions($certification2->id)));

        $DB->set_field('tool_mucertify_certification', 'archived', 1, ['id' => $certification1->id]);
        $this->assertSame(['reject'], $this->get_actions($certification1->id)['Anna Alpha']);

        $viewer = $this->getDataGenerator()->create_user();
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:view', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $viewer->id, \context_system::instance()->id);
        $this->setUser($viewer);
        $this->assertSame(['Anna Alpha' => [], 'Bob Beta' => [], 'Cyril Gamma' => []], $this->get_actions($certification1->id));

        $this->setUser($this->getDataGenerator()->create_user());
        $this->expectException(\core\exception\required_capability_exception::class);
        $this->get_rows($certification1->id);
    }
}
