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

/**
 * Certification notification for related users test.
 *
 * @group      openlms
 * @package    tool_certify
 * @copyright  2024 Open LMS (https://www.openlms.net/)
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_certify\local\notification\assignment_relateduser
 */
final class assignment_relateduser_test extends \advanced_testcase {
    public function setUp(): void {
        $this->resetAfterTest();
    }

    public function test_notification() {
        global $DB, $CFG;
        /** @var \tool_certify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_certify');
        /** @var \enrol_programs_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('enrol_programs');
        /** @var \profilefield_relateduser_generator $relatedgenerator */
        $relatedgenerator = $this->getDataGenerator()->get_plugin_generator('profilefield_relateduser');

        $categoryid = $relatedgenerator->add_profile_category();
        $profilefieldid = $relatedgenerator->add_profile_field($categoryid, 'relateduser');
        $profilefieldid2 = $relatedgenerator->add_profile_field($categoryid, 'relateduser');

        $related1 = $this->getDataGenerator()->create_user();
        $related2 = $this->getDataGenerator()->create_user();
        $related3 = $this->getDataGenerator()->create_user();

        $syscontext = \context_system::instance();
        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $program = $programgenerator->create_program(['sources' => 'certify', 'archived' => 1]);
        $certification = $generator->create_certification([
            'sources' => 'manual',
            'programid1' => $program->id,
            'contextid' => $syscontext->id,
        ]);
        $source = $DB->get_record('tool_certify_sources',
            ['type' => 'manual', 'certificationid' => $certification->id], '*', MUST_EXIST);

        $relatedgenerator->add_user_info_data($user1->id, $profilefieldid, $related1->id);
        $relatedgenerator->add_user_info_data($user2->id, $profilefieldid, $related2->id);

        $this->setAdminUser();
        $sink = $this->redirectMessages();
        \tool_certify\local\source\manual::assign_users($certification->id, $source->id, [$user1->id], []);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(0, $messages);

        set_config('notification_relateduserfield', $profilefieldid, 'tool_certify');

        $notification = $generator->create_certifiction_notification(['certificationid' => $certification->id, 'notificationtype' => 'assignment_relateduser']);
        $sink = $this->redirectMessages();
        \tool_certify\local\source\manual::assign_users($certification->id, $source->id, [$user2->id], []);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(1, $messages);
        $message = reset($messages);
        $assignment = $DB->get_record('tool_certify_assignments',
            ['userid' => $user2->id, 'certificationid' => $certification->id], '*', MUST_EXIST);
        $this->assertSame('User ' . fullname($user2) . ' was assigned to certification', $message->subject);
        $this->assertStringContainsString(fullname($user2) . ' has been assigned to certification', $message->fullmessage);
        $this->assertSame('tool_certify', $message->component);
        $this->assertSame($related2->id, $message->useridto);
        $this->assertSame('assignment_relateduser_notification', $message->eventtype);
        $this->assertSame("$CFG->wwwroot/admin/tool/certify/catalogue/certification.php?id=$certification->id", $message->contexturl);
        $this->assertSame('1', $message->notification);
    }
}
