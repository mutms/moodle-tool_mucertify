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

use tool_mucertify\mureport\system_report\certification_assignments;
use tool_mureport\mureport\request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

/**
 * Certification assignments report tests.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[CoversClass(certification_assignments::class)]
#[CoversClass(\tool_mucertify\mureport\entity\assignment::class)]
#[Group('MuTMS')]
final class certification_assignments_test extends \advanced_testcase {
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
        $report = certification_assignments::make_instance($certificationid);
        $report->require_access();
        return $report->get_query()->get_page($request)->export_rows();
    }

    /**
     * Returns user names of report rows.
     *
     * @param int $certificationid
     * @param request $request
     * @return string[]
     */
    private function get_names(int $certificationid, request $request = new request([])): array {
        return array_map(fn(array $row): string => strip_tags($row['cells']['auser:fullname']), $this->get_rows($certificationid, $request));
    }

    /**
     * Returns action names of a row.
     *
     * @param array $row
     * @return string[]
     */
    private function get_actions(array $row): array {
        return array_column($row['actions']['assignment:actions'] ?? [], 'name');
    }

    public function test_rows(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $user1 = $this->getDataGenerator()->create_user(['firstname' => 'Anna', 'lastname' => 'Alpha']);
        $user2 = $this->getDataGenerator()->create_user(['firstname' => 'Bob', 'lastname' => 'Beta']);
        $user3 = $this->getDataGenerator()->create_user(['firstname' => 'Cyril', 'lastname' => 'Gamma']);
        $certification1 = $generator->create_certification(['idnumber' => 'C1', 'fullname' => 'Alpha', 'sources' => ['manual' => []]]);
        $certification2 = $generator->create_certification(['idnumber' => 'C2', 'fullname' => 'Beta', 'sources' => ['manual' => []]]);
        $assignment1 = $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user1->id]);
        $assignment2 = $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user2->id]);
        $generator->create_certification_assignment(['certificationid' => $certification2->id, 'userid' => $user3->id]);
        $DB->set_field('tool_mucertify_assignment', 'archived', 1, ['id' => $assignment2->id]);

        $this->setAdminUser();
        $this->assertSame(['Anna Alpha', 'Bob Beta'], $this->get_names($certification1->id));
        $this->assertSame(['Anna Alpha'], $this->get_names($certification1->id, new request(['assignment:archived' => ['value' => 0]])));
        $this->assertSame(['Bob Beta'], $this->get_names($certification1->id, new request(['assignment:status' => ['values' => ['archived']]])));
        $this->assertSame(['Bob Beta'], $this->get_names($certification1->id, new request([], null, 0, null, 'bob')));
        $this->assertSame(['Cyril Gamma'], $this->get_names($certification2->id));

        $rows = $this->get_rows($certification1->id);
        $this->assertStringContainsString('/admin/tool/mucertify/management/assignment.php?id=' . $assignment1->id, $rows[0]['cells']['auser:fullname']);
        $this->assertSame(['update', 'archive'], $this->get_actions($rows[0]));
        $this->assertSame(['restore', 'delete'], $this->get_actions($rows[1]));
        $this->assertSame([false, true], array_column($rows, 'muted'));

        $viewer = $this->getDataGenerator()->create_user();
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:view', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $viewer->id, \context_system::instance()->id);
        $this->setUser($viewer);
        $rows = $this->get_rows($certification1->id);
        $this->assertCount(2, $rows);
        $this->assertSame([], $this->get_actions($rows[0]));

        $this->setUser($this->getDataGenerator()->create_user());
        $this->expectException(\core\exception\required_capability_exception::class);
        $this->get_rows($certification1->id);
    }

    public function test_fullname_formatters(): void {
        $column = certification_assignments::make_inspector()->get_selector_columns('auser:fullname')['auser:fullname'];
        $this->assertSame('assignmentlink', $column->get_default_formatter_id());
        $this->assertSame(
            ['fullname', 'link', 'picturelink', 'picturelinkstatus', 'assignmentlink'],
            array_keys($column->get_formatter_choices())
        );
    }

    public function test_invalid_certification(): void {
        $this->setAdminUser();
        $this->expectException(\core\exception\invalid_parameter_exception::class);
        certification_assignments::make_instance(-1)->require_access();
    }

    public function test_customfields(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \core_customfield_generator $cfgenerator */
        $cfgenerator = $this->getDataGenerator()->get_plugin_generator('core_customfield');
        /** @var \tool_mureport_generator $mureportgenerator */
        $mureportgenerator = $this->getDataGenerator()->get_plugin_generator('tool_mureport');
        $category = $cfgenerator->create_category(['component' => 'tool_mucertify', 'area' => 'assignment']);
        $managers = $cfgenerator->create_field(['categoryid' => $category->get('id'), 'shortname' => 'fmanagers',
            'configdata' => ['visibilitymanagers' => 1]]);
        $private = $cfgenerator->create_field(['categoryid' => $category->get('id'), 'shortname' => 'fprivate']);
        $mureportgenerator->create_report_column(['report' => certification_assignments::class, 'selector' => 'auser:fullname']);
        $mureportgenerator->create_report_column(['report' => certification_assignments::class, 'selector' => 'assignment:customfield:fmanagers']);
        $mureportgenerator->create_report_column(['report' => certification_assignments::class, 'selector' => 'assignment:customfield:fprivate']);
        $user1 = $this->getDataGenerator()->create_user(['firstname' => 'Anna', 'lastname' => 'Alpha']);
        $user2 = $this->getDataGenerator()->create_user(['firstname' => 'Bob', 'lastname' => 'Beta']);
        $certification = $generator->create_certification(['sources' => ['manual' => []]]);
        $assignment1 = $generator->create_certification_assignment(['certificationid' => $certification->id, 'userid' => $user1->id]);
        $assignment2 = $generator->create_certification_assignment(['certificationid' => $certification->id, 'userid' => $user2->id]);
        foreach ([[$assignment1, 'one'], [$assignment2, 'two']] as [$assignment, $suffix]) {
            $cfgenerator->add_instance_data($managers, (int)$assignment->id, "managers $suffix");
            $cfgenerator->add_instance_data($private, (int)$assignment->id, "private $suffix");
        }
        $viewer = $this->getDataGenerator()->create_user();
        $roleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:view', CAP_ALLOW, $roleid, \context_system::instance());
        role_assign($roleid, $viewer->id, \context_system::instance()->id);

        $filter = fn(string $name, string $value): array => array_map(
            fn(array $row): string => strip_tags($row['cells']['auser:fullname']),
            $this->get_rows($certification->id, new request(["assignment:customfield:$name" => ['value' => $value]]))
        );
        $this->setAdminUser();
        $this->assertSame(['Anna Alpha'], $filter('fmanagers', 'one'));
        $this->assertSame(['Anna Alpha'], $filter('fprivate', 'one'));

        $this->setUser($viewer);
        $this->assertSame(['Anna Alpha'], $filter('fmanagers', 'one'));
        $this->assertSame(['Anna Alpha', 'Bob Beta'], $filter('fprivate', 'one'));
        $cells = $this->get_rows($certification->id)[0]['cells'];
        $this->assertSame('managers one', $cells['assignment:customfield:fmanagers']);
        $this->assertStringContainsString(get_string('cellhidden', 'tool_mureport'), $cells['assignment:customfield:fprivate']);
    }
}
