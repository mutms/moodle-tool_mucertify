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

namespace tool_mucertify\phpunit\muform\autocomplete;

use tool_mucertify\muform\autocomplete\certification_periods_programid;
use tool_mulib\local\mulib;

/**
 * Certification periods program autocomplete source test.
 *
 * @group      MuTMS
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_mucertify\muform\autocomplete\certification_periods_programid
 */
final class certification_periods_programid_test extends \advanced_testcase {
    #[\Override]
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    public function test_get_args(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        $certification1 = $generator->create_certification([]);

        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification1->id);
        $this->assertSame([(int)$certification1->id], $source->get_args());
    }

    public function test_search(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $syscontext = \context_system::instance();
        $category1 = $this->getDataGenerator()->create_category([]);
        $catcontext1 = \context_coursecat::instance($category1->id);

        $program1 = $programgenerator->create_program([
            'fullname' => 'hokus',
            'idnumber' => 'p1',
            'description' => 'some desc 1',
            'descriptionformat' => FORMAT_MARKDOWN,
            'archived' => 0,
            'contextid' => $syscontext->id,
            'sources' => ['mucertify' => []],
        ]);
        $program2 = $programgenerator->create_program([
            'fullname' => 'pokus',
            'idnumber' => 'p2',
            'description' => '<b>some desc 2</b>',
            'descriptionformat' => FORMAT_HTML,
            'archived' => 0,
            'contextid' => $catcontext1->id,
            'sources' => ['mucertify' => [], 'cohort' => []],
        ]);
        $program3 = $programgenerator->create_program([
            'fullname' => 'Prog3',
            'idnumber' => 'p3',
            'archived' => 1,
            'contextid' => $syscontext->id,
            'sources' => ['mucertify' => []],
        ]);
        $program4 = $programgenerator->create_program([
            'fullname' => 'Prog4',
            'idnumber' => 'p4',
            'archived' => 0,
            'contextid' => $syscontext->id,
            'sources' => ['manual' => []],
        ]);

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        $editorroleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:edit', CAP_ALLOW, $editorroleid, $syscontext);
        assign_capability('tool/muprog:addtocertifications', CAP_ALLOW, $editorroleid, $syscontext);
        role_assign($editorroleid, $user1->id, $catcontext1->id);

        $certification1 = $generator->create_certification([
            'contextid' => $syscontext->id,
        ]);
        $certification2 = $generator->create_certification([
            'contextid' => $catcontext1->id,
        ]);

        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification1->id);
        $this->assertSame(50, $source->get_maxitems());
        $results = $source->search('', 50);
        $this->assertSame([
            (int)$program1->id => $program1->fullname,
            (int)$program2->id => $program2->fullname,
        ], $results);

        $results = $source->search('hoku', 50);
        $this->assertSame([(int)$program1->id => $program1->fullname], $results);

        $this->assertNull($source->search('', 1));
        $this->assertSame([(int)$program1->id => $program1->fullname], $source->search('hoku', 1));

        $this->setUser($user1);
        $source = new certification_periods_programid((int)$certification2->id);
        $results = $source->search('', 50);
        $this->assertSame([(int)$program2->id => $program2->fullname], $results);

        $this->setUser($user1);
        try {
            new certification_periods_programid((int)$certification1->id);
            $this->fail('Exception excepted');
        } catch (\moodle_exception $ex) {
            $this->assertInstanceOf(\required_capability_exception::class, $ex);
            $this->assertSame(
                'Sorry, but you do not currently have permissions to do that (Add and update certifications).',
                $ex->getMessage()
            );
        }
    }

    public function test_search_tenant(): void {
        if (!mulib::is_mutenancy_available()) {
            $this->markTestSkipped('tenant support not available');
        }

        \tool_mutenancy\local\tenancy::activate();

        /** @var \tool_mutenancy_generator $tenantgenerator */
        $tenantgenerator = $this->getDataGenerator()->get_plugin_generator('tool_mutenancy');

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $tenant1 = $tenantgenerator->create_tenant();
        $tenant1catcontext = \context_coursecat::instance($tenant1->categoryid);
        $tenant2 = $tenantgenerator->create_tenant();
        $tenant2catcontext = \context_coursecat::instance($tenant2->categoryid);

        $syscontext = \context_system::instance();

        $program0 = $programgenerator->create_program([
            'fullname' => 'Program 0',
            'archived' => 0,
            'contextid' => $syscontext->id,
            'sources' => ['mucertify' => []],
        ]);
        $program1 = $programgenerator->create_program([
            'fullname' => 'Program 1',
            'archived' => 0,
            'contextid' => $tenant1catcontext->id,
            'sources' => ['mucertify' => []],
        ]);
        $program2 = $programgenerator->create_program([
            'fullname' => 'Program 2',
            'archived' => 0,
            'contextid' => $tenant2catcontext->id,
            'sources' => ['mucertify' => []],
        ]);

        $user0 = $this->getDataGenerator()->create_user(['tenantid' => 0]);
        $user1 = $this->getDataGenerator()->create_user(['tenantid' => $tenant1->id]);
        $user2 = $this->getDataGenerator()->create_user(['tenantid' => $tenant1->id]);

        $editorroleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:edit', CAP_ALLOW, $editorroleid, $syscontext);
        assign_capability('tool/muprog:addtocertifications', CAP_ALLOW, $editorroleid, $syscontext);
        role_assign($editorroleid, $user0->id, $syscontext->id);
        role_assign($editorroleid, $user1->id, $syscontext->id);
        role_assign($editorroleid, $user2->id, $syscontext->id);

        $certification0 = $generator->create_certification([
            'contextid' => $syscontext->id,
        ]);
        $certification1 = $generator->create_certification([
            'contextid' => $tenant1catcontext->id,
        ]);
        $certification2 = $generator->create_certification([
            'contextid' => $tenant2catcontext->id,
        ]);

        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification0->id);
        $this->assertSame([(int)$program0->id, (int)$program1->id, (int)$program2->id], array_keys($source->search('', 50)));

        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification1->id);
        $this->assertSame([(int)$program0->id, (int)$program1->id], array_keys($source->search('', 50)));

        $this->setUser($user1);
        $source = new certification_periods_programid((int)$certification0->id);
        $this->assertSame([(int)$program0->id, (int)$program1->id], array_keys($source->search('', 50)));

        $this->setUser($user1);
        try {
            new certification_periods_programid((int)$certification2->id);
            $this->fail('Exception excepted');
        } catch (\moodle_exception $ex) {
            $this->assertInstanceOf(\required_capability_exception::class, $ex);
            $this->assertSame(
                'Sorry, but you do not currently have permissions to do that (Add and update certifications).',
                $ex->getMessage()
            );
        }

        // Programs of other tenants are not allowed.
        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification1->id);
        $this->assertSame($program0->fullname, $source->label((string)$program0->id));
        $this->assertSame($program1->fullname, $source->label((string)$program1->id));
        $this->assertNull($source->label((string)$program2->id));
        $this->assertNull($source->validate((string)$program2->id));
    }

    public function test_label(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $syscontext = \context_system::instance();
        $category1 = $this->getDataGenerator()->create_category([]);
        $catcontext1 = \context_coursecat::instance($category1->id);

        $program1 = $programgenerator->create_program([
            'fullname' => 'hokus',
            'idnumber' => 'p1',
            'contextid' => $syscontext->id,
            'sources' => ['mucertify' => []],
        ]);
        $program2 = $programgenerator->create_program([
            'fullname' => 'pokus',
            'idnumber' => 'p2',
            'contextid' => $catcontext1->id,
            'sources' => ['mucertify' => []],
        ]);

        $user1 = $this->getDataGenerator()->create_user();

        $editorroleid = $this->getDataGenerator()->create_role();
        assign_capability('tool/mucertify:edit', CAP_ALLOW, $editorroleid, $syscontext);
        assign_capability('tool/muprog:addtocertifications', CAP_ALLOW, $editorroleid, $syscontext);
        role_assign($editorroleid, $user1->id, $catcontext1->id);

        $certification1 = $generator->create_certification([
            'contextid' => $syscontext->id,
        ]);
        $certification2 = $generator->create_certification([
            'contextid' => $catcontext1->id,
        ]);
        $certification3 = $generator->create_certification([
            'contextid' => $catcontext1->id,
            'program1' => 'p1',
        ]);

        $this->setAdminUser();
        $source = new certification_periods_programid((int)$certification1->id);
        $this->assertSame($program1->fullname, $source->label((string)$program1->id));
        $this->assertSame($program2->fullname, $source->label((string)$program2->id));
        $this->assertNull($source->label('-1'));
        $this->assertNull($source->label('0'));
        $this->assertNull($source->label('abc'));
        $this->assertNull($source->label(''));
        $this->assertNull($source->label((string)($program2->id + 100)));
        $this->assertNull($source->validate((string)$program1->id));

        $this->setUser($user1);
        $source = new certification_periods_programid((int)$certification2->id);
        $this->assertNull($source->label((string)$program1->id));
        $this->assertSame($program2->fullname, $source->label((string)$program2->id));

        // Current value is always allowed.
        $source = new certification_periods_programid((int)$certification3->id);
        $this->assertSame($program1->fullname, $source->label((string)$program1->id));
        $this->assertSame($program2->fullname, $source->label((string)$program2->id));
    }

    public function test_draft_program(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $program1 = $programgenerator->create_program(['fullname' => 'Program 1', 'sources' => ['mucertify' => []]]);
        $program2 = $programgenerator->create_program(['fullname' => 'Program 2', 'draft' => 1, 'sources' => ['mucertify' => []]]);
        $certification = $generator->create_certification([]);

        $this->setAdminUser();

        $source = new certification_periods_programid((int)$certification->id);
        $this->assertSame([(int)$program1->id => 'Program 1'], $source->search('', 50));
        $this->assertSame('Program 1', $source->label((string)$program1->id));
        $this->assertNull($source->label((string)$program2->id));

        \tool_muprog\local\program::release($program2->id);
        $this->assertSame([(int)$program1->id => 'Program 1', (int)$program2->id => 'Program 2'], $source->search('', 50));
        $this->assertSame('Program 2', $source->label((string)$program2->id));
    }
}
