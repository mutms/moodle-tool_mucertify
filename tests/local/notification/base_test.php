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

namespace tool_certify\local\notification;

use tool_certify\local\source\manual;

/**
 * certification notifications base test.
 *
 * @group      openlms
 * @package    tool_certify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @author     Petr Skoda
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_certify\local\notification\base
 */
final class base_test extends \advanced_testcase {
    public function setUp(): void {
        $this->resetAfterTest();
    }

    public function test_get_assignment_placeholders() {
        global $DB, $CFG;

        /** @var \tool_certify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_certify');

        $certification1 = $generator->create_certification(['sources' => ['manual' => []]]);
        $source1 = $DB->get_record('tool_certify_sources', ['certificationid' => $certification1->id, 'type' => 'manual'], '*', MUST_EXIST);

        $certification2 = $generator->create_certification(['sources' => ['manual' => []]]);
        $source2 = $DB->get_record('tool_certify_sources', ['certificationid' => $certification2->id, 'type' => 'manual'], '*', MUST_EXIST);

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        $related1 = $this->getDataGenerator()->create_user();

        manual::assign_users($certification1->id, $source1->id, [$user1->id]);
        $assignment = $DB->get_record('tool_certify_assignments', ['certificationid' => $certification1->id, 'userid' => $user1->id], '*', MUST_EXIST);

        $strnotset = get_string('notset', 'tool_certify');

        $result = base::get_assignment_placeholders($certification1, $source1, $assignment, $user1);
        $this->assertIsArray($result);
        $this->assertSame(fullname($user1), $result['user_fullname']);
        $this->assertSame($user1->firstname, $result['user_firstname']);
        $this->assertSame($user1->lastname, $result['user_lastname']);
        $this->assertSame($certification1->fullname, $result['certification_fullname']);
        $this->assertSame($certification1->idnumber, $result['certification_idnumber']);
        $this->assertSame("$CFG->wwwroot/admin/tool/certify/my/certification.php?id=$certification1->id", $result['certification_url']);
        $this->assertSame('Manual assignment', $result['certification_sourcename']);
        $this->assertStringContainsString('Not certified', $result['certification_status']);

        $result = base::get_assignment_placeholders($certification1, $source1, $assignment, $user1, $related1);
        $this->assertIsArray($result);
        $this->assertSame(fullname($user1), $result['user_fullname']);
        $this->assertSame($user1->firstname, $result['user_firstname']);
        $this->assertSame($user1->lastname, $result['user_lastname']);
        $this->assertSame(fullname($related1), $result['relateduser_fullname']);
        $this->assertSame($related1->firstname, $result['relateduser_firstname']);
        $this->assertSame($related1->lastname, $result['relateduser_lastname']);
        $this->assertSame($certification1->fullname, $result['certification_fullname']);
        $this->assertSame($certification1->idnumber, $result['certification_idnumber']);
        $this->assertSame("$CFG->wwwroot/admin/tool/certify/catalogue/certification.php?id=$certification1->id", $result['certification_url']);
        $this->assertSame('Manual assignment', $result['certification_sourcename']);
        $this->assertStringContainsString('Not certified', $result['certification_status']);
    }

    public function test_get_notifier() {
        global $DB;

        /** @var \tool_certify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_certify');

        $certification1 = $generator->create_certification(['sources' => ['manual' => []]]);
        $source1 = $DB->get_record('tool_certify_sources', ['certificationid' => $certification1->id, 'type' => 'manual'], '*', MUST_EXIST);

        $certification2 = $generator->create_certification(['sources' => ['manual' => []]]);
        $source2 = $DB->get_record('tool_certify_sources', ['certificationid' => $certification2->id, 'type' => 'manual'], '*', MUST_EXIST);

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        manual::assign_users($certification1->id, $source1->id, [$user1->id]);
        $assignment1 = $DB->get_record('tool_certify_assignments', ['certificationid' => $certification1->id, 'userid' => $user1->id], '*', MUST_EXIST);

        $this->setUser(null);
        $result = base::get_notifier($certification1, $assignment1);
        $this->assertSame(-10, $result->id);

        $this->setUser($user2);
        $result = base::get_notifier($certification1, $assignment1);
        $this->assertSame(-10, $result->id);
    }

    function test_get_relateduser_fieldid() {
        /** @var \profilefield_relateduser_generator $relatedgenerator */
        $relatedgenerator = $this->getDataGenerator()->get_plugin_generator('profilefield_relateduser');

        $this->assertNull(base::get_relateduser_fieldid());

        $categoryid = $relatedgenerator->add_profile_category();
        $profilefieldid1 = $relatedgenerator->add_profile_field($categoryid, 'relateduser');
        $profilefieldid2 = $relatedgenerator->add_profile_field($categoryid, 'relateduser');

        $this->assertNull(base::get_relateduser_fieldid());

        set_config('notification_relateduserfield', $profilefieldid1, 'tool_certify');
        $this->assertSame($profilefieldid1, base::get_relateduser_fieldid());

        unset_config('version', 'profilefield_relateduser');
        $this->assertNull(base::get_relateduser_fieldid());
    }

    public function test_get_relateduser() {
        /** @var \profilefield_relateduser_generator $relatedgenerator */
        $relatedgenerator = $this->getDataGenerator()->get_plugin_generator('profilefield_relateduser');

        $categoryid = $relatedgenerator->add_profile_category();
        $profilefieldid = $relatedgenerator->add_profile_field($categoryid, 'relateduser');
        $profilefieldid2 = $relatedgenerator->add_profile_field($categoryid, 'relateduser');

        $related1 = $this->getDataGenerator()->create_user();
        $related2 = $this->getDataGenerator()->create_user();

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $user3 = $this->getDataGenerator()->create_user();

        $this->assertNull(base::get_relateduser($user1->id));
        $this->assertNull(base::get_relateduser($user2->id));
        $this->assertNull(base::get_relateduser($user3->id));

        set_config('notification_relateduserfield', $profilefieldid, 'tool_certify');
        $this->assertNull(base::get_relateduser($user1->id));
        $this->assertNull(base::get_relateduser($user2->id));
        $this->assertNull(base::get_relateduser($user3->id));

        $relatedgenerator->add_user_info_data($user1->id, $profilefieldid, $related1->id);
        $relatedgenerator->add_user_info_data($user2->id, $profilefieldid, $related2->id);
        $this->assertSame((array)$related1, (array)base::get_relateduser($user1->id));
        $this->assertSame((array)$related2, (array)base::get_relateduser($user2->id));
        $this->assertNull(base::get_relateduser($user3->id));
    }
}
