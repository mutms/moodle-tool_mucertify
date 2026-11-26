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

use tool_mucertify\mureport\system_report\certifications;
use tool_mureport\mureport\request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

/**
 * Certifications report tests.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversClass(certifications::class)]
#[CoversClass(\tool_mucertify\mureport\entity\certification::class)]
#[Group('MuTMS')]
final class certifications_test extends \advanced_testcase {
    #[\Override]
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Returns certification idnumbers of report rows.
     *
     * @param int $contextid
     * @param request $request
     * @return string[]
     */
    private function get_idnumbers(int $contextid, request $request = new request([])): array {
        $report = certifications::make_instance($contextid);
        $report->require_access();
        $rows = $report->get_query()->get_page($request)->export_rows();
        return array_map(fn(array $row): string => $row['cells']['certification:idnumber'], $rows);
    }

    public function test_rows(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $category1 = $this->getDataGenerator()->create_category();
        $category2 = $this->getDataGenerator()->create_category(['parent' => $category1->id]);
        $catcontext1 = \context_coursecat::instance($category1->id);
        $catcontext2 = \context_coursecat::instance($category2->id);
        $syscontext = \context_system::instance();
        $certification0 = $generator->create_certification(['idnumber' => 'C0', 'fullname' => 'Alpha']);
        $generator->create_certification(['idnumber' => 'C1', 'fullname' => 'Beta', 'contextid' => $catcontext1->id]);
        $certification2 = $generator->create_certification(['idnumber' => 'C2', 'fullname' => 'Gamma', 'contextid' => $catcontext2->id]);
        $certification3 = $generator->create_certification(['idnumber' => 'C3', 'fullname' => 'Old']);
        $DB->set_field('tool_mucertify_certification', 'archived', 1, ['id' => $certification3->id]);

        $this->setAdminUser();
        $this->assertSame(['C0', 'C1', 'C2', 'C3'], $this->get_idnumbers($syscontext->id));
        $this->assertSame(['C0', 'C1', 'C2'], $this->get_idnumbers($syscontext->id, new request(['certification:archived' => ['value' => 0]])));
        $this->assertSame(['C1', 'C2'], $this->get_idnumbers($catcontext1->id));
        $this->assertSame(['C1'], $this->get_idnumbers($syscontext->id, new request([], null, 0, null, 'beta')));
        $this->assertSame(['C2'], $this->get_idnumbers($syscontext->id, new request([], null, 0, null, (string)$certification2->id)));
        $category = new request(['certification:category' => ['values' => [(string)$catcontext1->id]]]);
        $this->assertSame(['C1'], $this->get_idnumbers($syscontext->id, $category));

        $rows = certifications::make_instance($syscontext->id)->get_query()->get_page(new request([]))->export_rows();
        $this->assertContains(true, array_column($rows, 'muted'));
        $this->assertContains(false, array_column($rows, 'muted'));
        $url = '/admin/tool/mucertify/management/certification.php?id=' . $certification0->id;
        $this->assertStringContainsString($url, $rows[0]['cells']['certification:fullname']);

        $user = $this->getDataGenerator()->create_user();
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:view', CAP_ALLOW, $roleid, $syscontext);
        role_assign($roleid, $user->id, $catcontext1->id);
        $this->setUser($user);
        $this->assertSame(['C1', 'C2'], $this->get_idnumbers($catcontext1->id));
        $this->expectException(\core\exception\required_capability_exception::class);
        $this->get_idnumbers($syscontext->id);
    }

    public function test_invalid_context(): void {
        $this->setAdminUser();
        $course = $this->getDataGenerator()->create_course();
        $this->expectException(\core\exception\invalid_parameter_exception::class);
        certifications::make_instance(\context_course::instance($course->id)->id)->require_access();
    }
}
