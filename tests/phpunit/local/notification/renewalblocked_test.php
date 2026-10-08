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

namespace tool_mucertify\phpunit\local\notification;

use tool_mucertify\local\assignment;
use tool_mucertify\local\certification;
use tool_mucertify\local\period;
use tool_mucertify\local\source\manual;

/**
 * Blocked recertification notification test.
 *
 * @group      MuTMS
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_mucertify\local\notification\renewalblocked
 */
final class renewalblocked_test extends \advanced_testcase {
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    public function test_notify_users(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $now = time();

        $program1 = $programgenerator->create_program(['sources' => 'mucertify']);
        $program2 = $programgenerator->create_program(['sources' => 'mucertify']);
        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $user3 = $this->getDataGenerator()->create_user();

        $data = [
            'sources' => 'manual',
            'programid1' => $program1->id,
            'recertify' => DAYSECS,
            'programid2' => $program1->id,
            'blockprogramreuse' => 1,
        ];
        $certification1 = $generator->create_certification($data);
        $certification2 = $generator->create_certification(['blockprogramreuse' => 0] + $data);
        $certification3 = $generator->create_certification($data);
        $this->assertSame('1', $certification1->blockprogramreuse);
        $this->assertSame('0', $certification2->blockprogramreuse);
        $source1 = $DB->get_record('tool_mucertify_source', ['type' => 'manual', 'certificationid' => $certification1->id], '*', MUST_EXIST);
        $source2 = $DB->get_record('tool_mucertify_source', ['type' => 'manual', 'certificationid' => $certification2->id], '*', MUST_EXIST);
        $source3 = $DB->get_record('tool_mucertify_source', ['type' => 'manual', 'certificationid' => $certification3->id], '*', MUST_EXIST);

        $dates = [
            'timewindowstart' => $now - YEARSECS,
            'timewindowdue' => null,
            'timewindowend' => null,
            'timefrom' => $now - YEARSECS,
            'timeuntil' => $now + DAYSECS - 77,
            'timecertified' => $now - YEARSECS + 10,
        ];
        // User 1 is waiting for recertification, user 2 is not there yet.
        manual::assign_users($certification1->id, $source1->id, [$user1->id], $dates);
        manual::assign_users($certification1->id, $source1->id, [$user2->id], ['timeuntil' => $now + WEEKSECS] + $dates);
        // Program reuse is allowed.
        manual::assign_users($certification2->id, $source2->id, [$user1->id], $dates);
        // Notification is not enabled.
        manual::assign_users($certification3->id, $source3->id, [$user3->id], $dates);

        period::process_recertifications(null, null);
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user1->id]));
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['certificationid' => $certification1->id, 'userid' => $user2->id]));
        $this->assertCount(2, $DB->get_records('tool_mucertify_period', ['certificationid' => $certification2->id, 'userid' => $user1->id]));
        $this->assertCount(1, $DB->get_records('tool_mucertify_period', ['certificationid' => $certification3->id, 'userid' => $user3->id]));

        $sink = $this->redirectMessages();
        \tool_mucertify\local\notification\renewalblocked::notify_users(null, null);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(0, $messages);

        $generator->create_certifiction_notification(['certificationid' => $certification1->id, 'notificationtype' => 'renewalblocked']);
        $generator->create_certifiction_notification(['certificationid' => $certification2->id, 'notificationtype' => 'renewalblocked']);

        $sink = $this->redirectMessages();
        \tool_mucertify\local\notification\renewalblocked::notify_users(null, null);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(1, $messages);
        $message = reset($messages);
        $this->assertSame($user1->id, $message->useridto);
        $this->assertSame('Certification recertification problem', $message->subject);
        $this->assertStringContainsString('could not be started', $message->fullmessage);
        $this->assertSame('tool_mucertify', $message->component);
        $this->assertSame('renewalblocked_notification', $message->eventtype);

        // Only once.
        $sink = $this->redirectMessages();
        \tool_mucertify\local\notification\renewalblocked::notify_users(null, null);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(0, $messages);

        // Nothing is sent after the setting is switched off.
        $generator->create_certifiction_notification(['certificationid' => $certification3->id, 'notificationtype' => 'renewalblocked']);
        certification::update_general((object)['id' => $certification3->id, 'blockprogramreuse' => 0]);
        $sink = $this->redirectMessages();
        \tool_mucertify\local\notification\renewalblocked::notify_users(null, null);
        $messages = $sink->get_messages();
        $sink->close();
        $this->assertCount(0, $messages);
    }
}
