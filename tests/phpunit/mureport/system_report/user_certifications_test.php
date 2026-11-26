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

use tool_mucertify\mureport\system_report\user_certifications;
use tool_mureport\mureport\request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

/**
 * User certifications report tests.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversClass(user_certifications::class)]
#[CoversClass(\tool_mucertify\mureport\entity\assignment::class)]
#[Group('MuTMS')]
final class user_certifications_test extends \advanced_testcase {
    #[\Override]
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Returns exported rows.
     *
     * @param int $userid
     * @param request $request
     * @return array
     */
    private function get_rows(int $userid, request $request = new request([])): array {
        $report = user_certifications::make_instance($userid);
        $report->require_access();
        return $report->get_query()->get_page($request)->export_rows();
    }

    /**
     * Returns certification idnumbers of report rows.
     *
     * @param int $userid
     * @param request $request
     * @return string[]
     */
    private function get_idnumbers(int $userid, request $request = new request([])): array {
        return array_map(fn(array $row): string => $row['cells']['certification:idnumber'], $this->get_rows($userid, $request));
    }

    public function test_rows(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $certification1 = $generator->create_certification(['idnumber' => 'C1', 'fullname' => 'Alpha', 'sources' => ['manual' => []]]);
        $certification2 = $generator->create_certification(['idnumber' => 'C2', 'fullname' => 'Beta', 'sources' => ['manual' => []]]);
        $certification3 = $generator->create_certification(['idnumber' => 'C3', 'fullname' => 'Gamma', 'sources' => ['manual' => []]]);
        $certification4 = $generator->create_certification(['idnumber' => 'C4', 'fullname' => 'Delta', 'sources' => ['manual' => []]]);
        $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user1->id]);
        $generator->create_certification_assignment(['certificationid' => $certification2->id, 'userid' => $user1->id]);
        $assignment3 = $generator->create_certification_assignment(['certificationid' => $certification3->id, 'userid' => $user1->id]);
        $generator->create_certification_assignment(['certificationid' => $certification4->id, 'userid' => $user1->id]);
        $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user2->id]);
        $DB->set_field('tool_mucertify_assignment', 'archived', 1, ['id' => $assignment3->id]);
        $DB->set_field('tool_mucertify_certification', 'archived', 1, ['id' => $certification4->id]);

        $this->setUser($user1);
        $this->assertSame(['C1', 'C2'], $this->get_idnumbers($user1->id));
        $this->assertSame(['C2'], $this->get_idnumbers($user1->id, new request([], null, 0, null, 'beta')));
        $rows = $this->get_rows($user1->id);
        $url = '/admin/tool/mucertify/my/certification.php?id=' . $certification1->id . '&amp;userid=' . $user1->id;
        $this->assertStringContainsString($url, $rows[0]['cells']['certification:fullname']);
        $this->assertArrayNotHasKey('assignment:actions', $rows[0]['cells']);

        try {
            $this->get_rows($user2->id);
            $this->fail('Exception expected');
        } catch (\core\exception\required_capability_exception $ex) {
            $this->assertInstanceOf(\core\exception\required_capability_exception::class, $ex);
        }
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:viewusercertifications', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $user1->id, \context_user::instance($user2->id)->id);
        $this->assertSame(['C1'], $this->get_idnumbers($user2->id));
    }

    public function test_invalid_user(): void {
        $this->setAdminUser();
        $this->expectException(\core\exception\invalid_parameter_exception::class);
        user_certifications::make_instance((int)guest_user()->id)->require_access();
    }
}
