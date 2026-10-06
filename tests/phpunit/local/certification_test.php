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

namespace tool_mucertify\phpunit\local;

use tool_muprog\local\course_reset;
use tool_mucertify\local\certification;
use core\exception\moodle_exception;
use core\exception\invalid_parameter_exception;

/**
 * Certification helper test.
 *
 * @group      MuTMS
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @copyright  2025 Petr Skoda
 * @author     Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers \tool_mucertify\local\certification
 */
final class certification_test extends \advanced_testcase {
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    public function test_get_description_editor_options(): void {
        $syscontext = \context_system::instance();

        $result = certification::get_description_editor_options();
        $this->assertIsArray($result);
        $this->assertSame(-1, $result['maxfiles']);
        $this->assertSame($syscontext, $result['context']);
    }

    public function test_get_image_filemanager_options(): void {
        $result = certification::get_image_filemanager_options();
        $this->assertIsArray($result);
        $this->assertSame(1, $result['maxfiles']);
        $this->assertSame(0, $result['subdirs']);
    }

    public function test_create(): void {
        global $DB;

        $syscontext = \context_system::instance();

        $category = $this->getDataGenerator()->create_category();
        $catcontext = \context_coursecat::instance($category->id);

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $expectedperiods = (array)certification::get_periods_defaults();

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $syscontext->id,
        ];
        $this->setCurrentTimeStart();
        $certification = certification::create((object)$data);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame((string)$syscontext->id, $certification->contextid);
        $this->assertSame('Certifikace 1', $certification->fullname);
        $this->assertSame('c1', $certification->idnumber);
        $this->assertSame('', $certification->description);
        $this->assertSame('1', $certification->descriptionformat);
        $this->assertSame('[]', $certification->presentationjson);
        $this->assertSame('0', $certification->archived);
        $this->assertSame(null, $certification->programid1);
        $this->assertSame(null, $certification->programid2);
        $this->assertSame(null, $certification->recertify);
        $this->assertSame($expectedperiods, json_decode($certification->periodsjson, true));
        $this->assertTimeCurrent($certification->timecreated);
        $sources = $DB->get_records('tool_mucertify_source', ['certificationid' => $certification->id]);
        $this->assertCount(0, $sources);

        $program1 = $programgenerator->create_program();
        $program2 = $programgenerator->create_program();
        $program3 = $programgenerator->create_program();

        $data = [
            'fullname' => 'Certifikace 2',
            'idnumber' => 'c2',
            'description' => 'some desc',
            'descriptionformat' => \FORMAT_MARKDOWN,
            'contextid' => $catcontext->id,
            'programid1' => $program1->id,
            'programid2' => $program2->id,
            'recertify' => '98765',
        ];
        $this->setCurrentTimeStart();
        $certification = certification::create((object)$data);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame((string)$catcontext->id, $certification->contextid);
        $this->assertSame('Certifikace 2', $certification->fullname);
        $this->assertSame('c2', $certification->idnumber);
        $this->assertSame('some desc', $certification->description);
        $this->assertSame('4', $certification->descriptionformat);
        $this->assertSame('[]', $certification->presentationjson);
        $this->assertSame('0', $certification->archived);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame($program2->id, $certification->programid2);
        $this->assertSame('98765', $certification->recertify);
        $this->assertSame($expectedperiods, json_decode($certification->periodsjson, true));
        $this->assertTimeCurrent($certification->timecreated);

        $data = [
            'fullname' => 'Certifikace 3',
            'idnumber' => 'c3',
            'contextid' => $catcontext->id,
            'programid1' => $program1->id,
            'programid2' => $program2->id,
            'recertify' => null,
        ];
        $certification = certification::create((object)$data);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame(null, $certification->programid2);
        $this->assertSame(null, $certification->recertify);

        $data = (object)[
            'fullname' => 'Certification with manual source',
            'idnumber' => 'C4',
            'contextid' => $syscontext->id,
            'addsources' => ['manual' => 1],
        ];
        $certification = certification::create((object)$data);
        $this->assertTrue($DB->record_exists('tool_mucertify_source', ['certificationid' => $certification->id, 'type' => 'manual']));

        $data = (object)[
            'fullname' => 'Certification without manual source',
            'idnumber' => 'C5',
            'contextid' => $syscontext->id,
            'addsources' => ['manual' => 0],
        ];
        $certification = certification::create((object)$data);
        $this->assertFalse($DB->record_exists('tool_mucertify_source', ['certificationid' => $certification->id, 'type' => 'manual']));
    }

    public function test_update_general(): void {
        $syscontext = \context_system::instance();

        $category = $this->getDataGenerator()->create_category();
        $catcontext = \context_coursecat::instance($category->id);

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $expectedperiods = (array)certification::get_periods_defaults();

        $program1 = $programgenerator->create_program();
        $program2 = $programgenerator->create_program();
        $program3 = $programgenerator->create_program();

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $catcontext->id,
        ];
        $certification = certification::create((object)$data);

        $data = [
            'id' => $certification->id,
            'fullname' => 'Certifikace 2',
            'idnumber' => 'c2',
            'description' => 'some desc',
            'descriptionformat' => \FORMAT_MARKDOWN,
            'contextid' => $catcontext->id,
            'programid1' => $program1->id,
            'programid2' => $program2->id,
            'recertify' => '98765',
        ];
        $certification2 = certification::update_general((object)$data);
        $this->assertInstanceOf('stdClass', $certification2);
        $this->assertSame((string)$catcontext->id, $certification2->contextid);
        $this->assertSame('Certifikace 2', $certification2->fullname);
        $this->assertSame('c2', $certification2->idnumber);
        $this->assertSame('some desc', $certification2->description);
        $this->assertSame('4', $certification2->descriptionformat);
        $this->assertSame('[]', $certification2->presentationjson);
        $this->assertSame('0', $certification2->archived);
        $this->assertSame(null, $certification2->programid1);
        $this->assertSame(null, $certification2->programid2);
        $this->assertSame(null, $certification2->recertify);
        $this->assertSame($expectedperiods, json_decode($certification2->periodsjson, true));
        $this->assertSame($certification->timecreated, $certification2->timecreated);

        $this->assertDebuggingNotCalled();
        $data = (object)[
            'id' => $certification->id,
            'archived' => 1,
        ];
        $certification = certification::update_general($data);
        $this->assertDebuggingCalled('Use certification::archive() and certification::restore() to change archived flag');
        $this->assertSame('0', $certification->archived);
    }

    public function test_move_customfields(): void {
        global $DB;

        $syscontext = \context_system::instance();
        $category = $this->getDataGenerator()->create_category([]);
        $catcontext = \context_coursecat::instance($category->id);
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \core_customfield_generator $cfgenerator */
        $cfgenerator = $this->getDataGenerator()->get_plugin_generator('core_customfield');

        $pcategory = $cfgenerator->create_category(['component' => 'tool_mucertify', 'area' => 'certification']);
        $pfield = $cfgenerator->create_field(['categoryid' => $pcategory->get('id'), 'shortname' => 'pf', 'type' => 'text']);
        $acategory = $cfgenerator->create_category(['component' => 'tool_mucertify', 'area' => 'assignment']);
        $afield = $cfgenerator->create_field(['categoryid' => $acategory->get('id'), 'shortname' => 'af', 'type' => 'text']);

        $certification1 = $generator->create_certification(['contextid' => $syscontext->id, 'sources' => ['manual' => []]]);
        $certification2 = $generator->create_certification(['contextid' => $syscontext->id, 'sources' => ['manual' => []]]);
        $user = $this->getDataGenerator()->create_user();
        $assignment1 = $generator->create_certification_assignment(['certificationid' => $certification1->id, 'userid' => $user->id]);
        $assignment2 = $generator->create_certification_assignment(['certificationid' => $certification2->id, 'userid' => $user->id]);
        $cfgenerator->add_instance_data($pfield, $certification1->id, 'p1');
        $cfgenerator->add_instance_data($pfield, $certification2->id, 'p2');
        $cfgenerator->add_instance_data($afield, $assignment1->id, 'a1');
        $cfgenerator->add_instance_data($afield, $assignment2->id, 'a2');

        certification::move($certification1->id, $catcontext->id);

        $this->assertEquals($catcontext->id, $DB->get_field('customfield_data', 'contextid', ['fieldid' => $pfield->get('id'), 'instanceid' => $certification1->id]));
        $this->assertEquals($catcontext->id, $DB->get_field('customfield_data', 'contextid', ['fieldid' => $afield->get('id'), 'instanceid' => $assignment1->id]));
        $this->assertEquals($syscontext->id, $DB->get_field('customfield_data', 'contextid', ['fieldid' => $pfield->get('id'), 'instanceid' => $certification2->id]));
        $this->assertEquals($syscontext->id, $DB->get_field('customfield_data', 'contextid', ['fieldid' => $afield->get('id'), 'instanceid' => $assignment2->id]));
    }

    public function test_move(): void {
        $syscontext = \context_system::instance();

        $category = $this->getDataGenerator()->create_category();
        $catcontext = \context_coursecat::instance($category->id);
        $course = $this->getDataGenerator()->create_course();
        $coursecontext = \context_course::instance($course->id);

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $catcontext->id,
        ];
        $certification = certification::create((object)$data);
        $this->assertSame((string)$catcontext->id, $certification->contextid);

        $certification = certification::move($certification->id, $syscontext->id);
        $this->assertSame((string)$syscontext->id, $certification->contextid);

        $certification = certification::move($certification->id, $catcontext->id);
        $this->assertSame((string)$catcontext->id, $certification->contextid);

        try {
            certification::move($certification->id, $coursecontext->id);
            $this->fail('Exception expected');
        } catch (moodle_exception $ex) {
            $this->assertInstanceOf(invalid_parameter_exception::class, $ex);
            $this->assertSame('Invalid parameter value detected (System or category context expected)', $ex->getMessage());
        }

        // Test tags are not moved.

        $data = [
            'fullname' => 'Certifikace 2',
            'idnumber' => 'c2',
            'contextid' => $catcontext->id,
            'tags' => ['hokus', 'pokus'],
        ];
        $certification2 = certification::create((object)$data);
        $this->assertEqualsCanonicalizing(
            ['hokus', 'pokus'],
            \core_tag_tag::get_item_tags_array('tool_mucertify', 'tool_mucertify_certification', $certification2->id)
        );
        $tags = \core_tag_tag::get_item_tags('tool_mucertify', 'tool_mucertify_certification', $certification2->id);
        foreach ($tags as $tag) {
            $this->assertEquals($syscontext->id, $tag->taginstancecontextid);
        }

        $certification2 = certification::move($certification2->id, $syscontext->id);
        $this->assertEqualsCanonicalizing(
            ['hokus', 'pokus'],
            \core_tag_tag::get_item_tags_array('tool_mucertify', 'tool_mucertify_certification', $certification2->id)
        );
        $tags = \core_tag_tag::get_item_tags('tool_mucertify', 'tool_mucertify_certification', $certification2->id);
        foreach ($tags as $tag) {
            $this->assertEquals($syscontext->id, $tag->taginstancecontextid);
        }

        // Test images are not moved.

        $admin = get_admin();
        $this->setUser($admin);
        $fs = get_file_storage();
        $context = \context_user::instance($admin->id);

        $draftid1 = \file_get_unused_draft_itemid();
        $record = [
            'contextid' => $context->id,
            'component' => 'user',
            'filearea' => 'draft',
            'itemid' => $draftid1,
            'filepath' => '/',
            'filename' => 'someimage.jpg',
        ];
        $fs->create_file_from_string($record, 'content is irrelevant');
        $draftid2 = \file_get_unused_draft_itemid();
        $record = [
            'contextid' => $context->id,
            'component' => 'user',
            'filearea' => 'draft',
            'itemid' => $draftid2,
            'filepath' => '/',
            'filename' => 'otherimage.jpg',
        ];
        $fs->create_file_from_string($record, 'content is irrelevant');

        $data = [
            'fullname' => 'Certifikace 3',
            'idnumber' => 'c3',
            'contextid' => $catcontext->id,
            'description_editor' => ['text' => 'xx', 'format' => FORMAT_HTML, 'itemid' => $draftid1],
            'image' => $draftid2,
        ];
        $certification3 = certification::create((object)$data);
        $this->assertTrue($fs->file_exists($syscontext->id, 'tool_mucertify', 'description', $certification3->id, '/', 'someimage.jpg'));
        $this->assertTrue($fs->file_exists($syscontext->id, 'tool_mucertify', 'image', $certification3->id, '/', 'otherimage.jpg'));

        $certification3 = certification::move($certification3->id, $syscontext->id);
        $this->assertTrue($fs->file_exists($syscontext->id, 'tool_mucertify', 'description', $certification3->id, '/', 'someimage.jpg'));
        $this->assertTrue($fs->file_exists($syscontext->id, 'tool_mucertify', 'image', $certification3->id, '/', 'otherimage.jpg'));
    }

    public function test_get_image_url(): void {
        $syscontext = \context_system::instance();

        $admin = get_admin();
        $this->setUser($admin);
        $draftid = \file_get_unused_draft_itemid();
        $fs = get_file_storage();
        $context = \context_user::instance($admin->id);
        $record = [
            'contextid' => $context->id,
            'component' => 'user',
            'filearea' => 'draft',
            'itemid' => $draftid,
            'filepath' => '/',
            'filename' => 'image.png',
        ];
        $fs->create_file_from_string($record, 'content is irrelevant');
        $data = (object)[
            'fullname' => 'Some certification',
            'idnumber' => 'SP1',
            'contextid' => $syscontext->id,
            'image' => $draftid,
        ];
        $certification1 = certification::create($data);
        $this->assertSame('{"image":"image.png"}', $certification1->presentationjson);

        $data = (object)[
            'fullname' => 'Some other certification',
            'idnumber' => 'SP2',
            'contextid' => $syscontext->id,
        ];
        $certification2 = certification::create($data);
        $this->assertSame('[]', $certification2->presentationjson);

        $this->assertSame(
            "https://www.example.com/moodle/pluginfile.php/{$syscontext->id}/tool_mucertify/image/{$certification1->id}/image.png",
            certification::get_image_url($certification1, false)->out(false)
        );
        $this->assertSame(
            "https://www.example.com/moodle/pluginfile.php/{$syscontext->id}/tool_mucertify/image/{$certification1->id}/image.png",
            certification::get_image_url($certification1, true)->out(false)
        );

        $this->assertSame(
            null,
            certification::get_image_url($certification2, false)
        );
        $this->assertSame(
            "https://www.example.com/moodle/pluginfile.php/{$syscontext->id}/tool_mucertify/image/{$certification2->id}/geopattern.svg",
            certification::get_image_url($certification2, true)->out(false)
        );
    }

    public function test_get_image_geopattern(): void {
        $geopattern = certification::get_image_geopattern(77);
        $this->assertStringStartsWith(
            '<?xml version="1.0"?><svg xmlns="http://www.w3.org/2000/svg" width="340" height="340"><rect x="0" y="0" width="100%" height="100%"',
            $geopattern->toSVG()
        );
    }

    public function test_archive(): void {
        $syscontext = \context_system::instance();

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $syscontext->id,
        ];
        $certification = certification::create((object)$data);
        $this->assertSame('0', $certification->archived);

        $certification = certification::archive($certification->id);
        $this->assertSame('1', $certification->archived);

        $certification = certification::archive($certification->id);
        $this->assertSame('1', $certification->archived);
    }

    public function test_restore(): void {
        $syscontext = \context_system::instance();

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $syscontext->id,
            'archived' => 1,
        ];
        $certification = certification::create((object)$data);
        $this->assertSame('1', $certification->archived);

        $certification = certification::restore($certification->id);
        $this->assertSame('0', $certification->archived);

        $certification = certification::restore($certification->id);
        $this->assertSame('0', $certification->archived);
    }

    public function test_update_settings(): void {
        $category = $this->getDataGenerator()->create_category();
        $catcontext = \context_coursecat::instance($category->id);

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $program1 = $programgenerator->create_program();
        $program2 = $programgenerator->create_program();
        $program3 = $programgenerator->create_program();

        $defaultperiods = (array)certification::get_periods_defaults();

        $data = [
            'fullname' => 'Certifikace 1',
            'idnumber' => 'c1',
            'contextid' => $catcontext->id,
        ];
        $certification = certification::create((object)$data);

        $data = [
            'id' => $certification->id,
        ];
        $certification = certification::update_settings((object)$data);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame(null, $certification->programid1);
        $this->assertSame(null, $certification->programid2);
        $this->assertSame(null, $certification->recertify);
        $this->assertSame($defaultperiods, json_decode($certification->periodsjson, true));

        $data = [
            'id' => (string)$certification->id,
            'programid1' => $program1->id,
            'resettype1' => course_reset::RESETTYPE_FULL,
            'due1' => '9876',
            'valid1' => certification::SINCE_WINDOWDUE,
            'windowend1' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], 'days'),
            'expiration1' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'], 'days'),
        ];
        $certification = certification::update_settings((object)$data);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame(null, $certification->programid2);
        $this->assertSame(null, $certification->recertify);
        $periods = (object)json_decode($certification->periodsjson, true);
        $this->assertSame($data['resettype1'], $periods->resettype1);
        $this->assertSame($data['due1'], $periods->due1);
        $this->assertSame($data['valid1'], $periods->valid1);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], $periods->windowend1);
        $this->assertSame(['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'], $periods->expiration1);

        $data2 = [
            'id' => (string)$certification->id,
            'recertify' => (string)DAYSECS,
        ];
        $certification = certification::update_settings((object)$data2);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame($program1->id, $certification->programid2);
        $this->assertSame($data2['recertify'], $certification->recertify);
        $periods = (object)json_decode($certification->periodsjson, true);
        $this->assertSame($data['resettype1'], $periods->resettype1);
        $this->assertSame($data['due1'], $periods->due1);
        $this->assertSame($data['valid1'], $periods->valid1);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], $periods->windowend1);
        $this->assertSame(['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'], $periods->expiration1);
        $this->assertSame(null, $periods->grace2);
        $this->assertSame($defaultperiods['resettype2'], $periods->resettype2);
        $this->assertSame($defaultperiods['valid2'], $periods->valid2);
        $this->assertSame($periods->windowend1, $periods->windowend2);
        $this->assertSame($periods->expiration1, $periods->expiration2);

        $data3 = [
            'id' => (string)$certification->id,
            'programid2' => $program2->id,
            'grace2' => '12345',
            'resettype2' => course_reset::RESETTYPE_STANDARD,
            'valid2' => certification::SINCE_CERTIFIED,
            'windowend2' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], 'days'),
            'expiration2' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P1Y'], 'days'),
        ];
        $certification = certification::update_settings((object)$data3);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame($program2->id, $certification->programid2);
        $this->assertSame($data2['recertify'], $certification->recertify);
        $periods = (object)json_decode($certification->periodsjson, true);
        $this->assertSame($data['resettype1'], $periods->resettype1);
        $this->assertSame($data['due1'], $periods->due1);
        $this->assertSame($data['valid1'], $periods->valid1);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], $periods->windowend1);
        $this->assertSame(['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'], $periods->expiration1);
        $this->assertSame($data3['grace2'], (string)$periods->grace2);
        $this->assertSame($data3['resettype2'], $periods->resettype2);
        $this->assertSame($data3['valid2'], $periods->valid2);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P7D'], $periods->windowend2);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P1Y'], $periods->expiration2);

        $data4 = [
            'id' => (string)$certification->id,
            'recertify' => null,
            'windowend1' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_NEVER, 'delay' => null], 'days'),
            'expiration1' => \tool_mucertify\local\util::get_delay_form_value(['since' => certification::SINCE_NEVER, 'delay' => null], 'days'),
        ];
        $certification = certification::update_settings((object)$data4);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame(null, $certification->programid2);
        $this->assertSame(null, $certification->recertify);
        $periods = (object)json_decode($certification->periodsjson, true);
        $this->assertSame($data['resettype1'], $periods->resettype1);
        $this->assertSame($data['due1'], $periods->due1);
        $this->assertSame($data['valid1'], $periods->valid1);
        $this->assertSame(['since' => certification::SINCE_NEVER, 'delay' => null], $periods->windowend1);
        $this->assertSame(['since' => certification::SINCE_NEVER, 'delay' => null], $periods->expiration1);
        $this->assertSame($data3['grace2'], (string)$periods->grace2);
        $this->assertSame($data3['resettype2'], $periods->resettype2);
        $this->assertSame($data3['valid2'], $periods->valid2);
        $this->assertSame($periods->windowend1, $periods->windowend2);
        $this->assertSame($periods->expiration1, $periods->expiration2);

        $data5 = [
            'id' => (string)$certification->id,
            'recertify' => (string)WEEKSECS,
            'windowend1' => ['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P6D'],
            'expiration1' => ['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'],
            'windowend2' => ['since' => certification::SINCE_WINDOWDUE, 'delay' => 'P7D'],
            'expiration2' => ['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P2Y'],
        ];
        $certification = certification::update_settings((object)$data5);
        $this->assertInstanceOf('stdClass', $certification);
        $this->assertSame($program1->id, $certification->programid1);
        $this->assertSame($program1->id, $certification->programid2);
        $this->assertSame($data5['recertify'], $certification->recertify);
        $periods = (object)json_decode($certification->periodsjson, true);
        $this->assertSame($data['resettype1'], $periods->resettype1);
        $this->assertSame($data['due1'], $periods->due1);
        $this->assertSame($data['valid1'], $periods->valid1);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P6D'], $periods->windowend1);
        $this->assertSame(['since' => certification::SINCE_CERTIFIED, 'delay' => 'P1Y'], $periods->expiration1);
        $this->assertSame($data3['grace2'], (string)$periods->grace2);
        $this->assertSame($data3['resettype2'], $periods->resettype2);
        $this->assertSame($data3['valid2'], $periods->valid2);
        $this->assertSame(['since' => certification::SINCE_WINDOWDUE, 'delay' => 'P7D'], $periods->windowend2);
        $this->assertSame(['since' => certification::SINCE_WINDOWSTART, 'delay' => 'P2Y'], $periods->expiration2);
    }

    public function test_update_certificate(): void {
        if (!\tool_mucertify\local\certificate::is_available()) {
            $this->markTestSkipped('tool_certificate not available');
        }

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_certificate_generator $certificategenerator */
        $certificategenerator = $this->getDataGenerator()->get_plugin_generator('tool_certificate');

        $certification = $generator->create_certification();
        $this->assertSame(null, $certification->templateid);

        $template = $certificategenerator->create_template(['name' => 't1']);

        $certification = certification::update_certificate($certification->id, $template->get_id());
        $this->assertSame((string)$template->get_id(), $certification->templateid);

        $certification = certification::update_certificate($certification->id, null);
        $this->assertSame(null, $certification->templateid);

        $certification = certification::update_certificate($certification->id, $template->get_id());
        $certification = certification::update_certificate($certification->id, 0);
        $this->assertSame(null, $certification->templateid);
    }

    public function test_delete(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $program1 = $programgenerator->create_program();
        $program2 = $programgenerator->create_program();
        $category = $this->getDataGenerator()->create_category([]);
        $catcontext = \context_coursecat::instance($category->id);

        $certification1 = $generator->create_certification();

        $data = (object)[
            'fullname' => 'Some other certification',
            'idnumber' => 'SP2',
            'contextid' => $catcontext->id,
            'description' => 'Some desc',
            'descriptionformat' => '2',
            'presentation' => ['some' => 'test'],
            'archived' => '1',
            'sources' => ['manual' => []],
            'programid1' => $program1->id,
            'programid2' => $program2->id,
            'recertify' => '77777',
        ];
        $certification2 = $generator->create_certification($data);

        certification::delete($certification2->id);
        $this->assertSame(false, $DB->record_exists('tool_mucertify_certification', ['id' => $certification2->id]));
        $this->assertSame(true, $DB->record_exists('tool_mucertify_certification', ['id' => $certification1->id]));
    }

    public function test_pre_course_category_delete(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        $category = $this->getDataGenerator()->create_category([]);
        $catcontext = \context_coursecat::instance($category->id);
        $syscontext = \context_system::instance();

        $data = (object)[
            'fullname' => 'Some other certification',
            'idnumber' => 'SP',
            'contextid' => $catcontext->id,
        ];
        $certification = $generator->create_certification($data);

        certification::pre_course_category_delete($category->get_db_record());
        $certification = $DB->get_record('tool_mucertify_certification', ['id' => $certification->id], '*', MUST_EXIST);
        $this->assertSame((string)$syscontext->id, $certification->contextid);

        $data = (object)[
            'fullname' => 'Some other certification 2',
            'idnumber' => 'SP 2',
            'contextid' => $catcontext->id,
        ];
        $certification2 = $generator->create_certification($data);

        $category->delete_full(false);
        $certification2 = $DB->get_record('tool_mucertify_certification', ['id' => $certification2->id], '*', MUST_EXIST);
        $this->assertSame((string)$syscontext->id, $certification2->contextid);
    }

    public function test_get_periods_defaults(): void {
        $expected = [
            'resettype1' => 2,
            'due1' => null,
            'valid1' => 'certified',
            'windowend1' => ['since' => 'never', 'delay' => null],
            'expiration1' => ['since' => 'never', 'delay' => null],
            'grace2' => null,
            'resettype2' => 2,
            'valid2' => 'windowdue',
            'windowend2' => ['since' => 'never', 'delay' => null],
            'expiration2' => ['since' => 'never', 'delay' => null],
        ];
        $defaults = certification::get_periods_defaults();
        $this->assertInstanceOf(\stdClass::class, $defaults);
        $this->assertSame($expected, (array)$defaults);
    }

    public function test_get_periods_settings(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');

        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $perioddefaults = certification::get_periods_defaults();

        $program1 = $programgenerator->create_program();
        $program2 = $programgenerator->create_program();

        $data = (object)[
            'fullname' => 'Some other certification',
            'idnumber' => 'SP',
            'programid1' => $program1->id,
            'programid2' => $program2->id,
            'recertify' => '77777',
        ];
        $certification = $generator->create_certification($data);

        $result = certification::get_periods_settings($certification);
        $this->assertInstanceOf(\stdClass::class, $result);
        $expected = certification::get_periods_defaults();
        $expected->programid1 = $program1->id;
        $expected->programid2 = $program2->id;
        $expected->recertify = $data->recertify;
        $this->assertEquals((array)$expected, (array)$result);

        $certification->programid2 = null;
        $result = certification::get_periods_settings($certification);
        $expected->programid2 = $program1->id;
        $this->assertEquals((array)$expected, (array)$result);

        $this->assertDebuggingNotCalled();

        $periods = json_decode($certification->periodsjson);
        $periods->resettype1 = 'xxxx';
        $certification->periodsjson = \tool_mucertify\local\util::json_encode($periods);
        $result = certification::get_periods_settings($certification);
        $expected->resettype1 = $perioddefaults->resettype1;
        $this->assertEquals((array)$expected, (array)$result);
        $this->assertDebuggingCalled("invalid resettype1 detected in $certification->id certification");
    }

    public function test_get_resettype_options(): void {
        $result = certification::get_resettype_options();
        $this->assertIsArray($result);
        $this->assertArrayHasKey(course_reset::RESETTYPE_NONE, $result);
        $this->assertArrayHasKey(course_reset::RESETTYPE_DEALLOCATE, $result);
        $this->assertArrayHasKey(course_reset::RESETTYPE_STANDARD, $result);
        $this->assertArrayHasKey(course_reset::RESETTYPE_FULL, $result);
        $this->assertCount(4, $result);
    }

    public function test_get_valid_options(): void {
        $result = certification::get_valid_options();
        $this->assertIsArray($result);
        $this->assertArrayHasKey(certification::SINCE_CERTIFIED, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWSTART, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWDUE, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWEND, $result);
        $this->assertCount(4, $result);
    }

    public function test_get_windowend_options(): void {
        $result = certification::get_windowend_options();
        $this->assertIsArray($result);
        $this->assertArrayHasKey(certification::SINCE_NEVER, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWSTART, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWDUE, $result);
        $this->assertCount(3, $result);
    }

    public function test_get_expiration_options(): void {
        $result = certification::get_expiration_options();
        $this->assertIsArray($result);
        $this->assertArrayHasKey(certification::SINCE_NEVER, $result);
        $this->assertArrayHasKey(certification::SINCE_CERTIFIED, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWSTART, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWDUE, $result);
        $this->assertArrayHasKey(certification::SINCE_WINDOWEND, $result);
        $this->assertCount(5, $result);
    }

    public function test_get_catalogue_item(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_mucatalog_generator $cataloggenerator */
        $cataloggenerator = $this->getDataGenerator()->get_plugin_generator('tool_mucatalog');

        $guest = guest_user();
        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        $cohort1 = $this->getDataGenerator()->create_cohort();
        cohort_add_member($cohort1->id, $user2->id);

        $certification1 = $generator->create_certification();
        $certification2 = $generator->create_certification();
        $certification3 = $generator->create_certification();
        $certification4 = $generator->create_certification();

        // Catalogue is not active without active sections.
        $this->setUser($user1);
        $section0 = $cataloggenerator->create_section(['uservisible' => 1, 'status' => \tool_mucatalog\local\util::STATUS_DRAFT]);
        $item0 = $cataloggenerator->create_item(['sectionid' => $section0->id, 'type' => 'certification', 'referenceid' => $certification1->id]);
        $this->assertNull(certification::get_catalogue_item($certification1));
        $this->assertNull(certification::get_catalogue_item($certification1, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification1, $user2->id));

        $section1 = $cataloggenerator->create_section(['uservisible' => 1, 'status' => \tool_mucatalog\local\util::STATUS_ACTIVE]);
        $section2 = $cataloggenerator->create_section([
            'uservisible' => 0,
            'cohortvisible' => [$cohort1->id],
            'status' => \tool_mucatalog\local\util::STATUS_ACTIVE,
        ]);
        $item1 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification1->id]);
        $item2 = $cataloggenerator->create_item(['sectionid' => $section2->id, 'type' => 'certification', 'referenceid' => $certification2->id]);
        $item3 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification3->id]);
        $certification3 = certification::archive($certification3->id);

        $this->setUser($user1);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        $this->assertNull(certification::get_catalogue_item($certification2));
        $this->assertNull(certification::get_catalogue_item($certification3));
        $this->assertNull(certification::get_catalogue_item($certification4));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification2, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification3, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification4, $user1->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user2->id));
        $this->assertEquals($item2, certification::get_catalogue_item($certification2, $user2->id));
        $this->assertNull(certification::get_catalogue_item($certification3, $user2->id));
        $this->assertNull(certification::get_catalogue_item($certification4, $user2->id));
        $this->assertNull(certification::get_catalogue_item($certification1, $guest->id));
        $this->assertNull(certification::get_catalogue_item($certification2, $guest->id));
        $this->assertNull(certification::get_catalogue_item($certification1, 0));

        $this->setUser($user2);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        $this->assertEquals($item2, certification::get_catalogue_item($certification2));
        $this->assertNull(certification::get_catalogue_item($certification3));
        $this->assertNull(certification::get_catalogue_item($certification4));
        $this->assertNull(certification::get_catalogue_item($certification2, $user1->id));

        $this->setUser($guest);
        $this->assertNull(certification::get_catalogue_item($certification1));
        $this->setUser(null);
        $this->assertNull(certification::get_catalogue_item($certification1));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user1->id));

        $section1 = \tool_mucatalog\local\section::update((object)['id' => $section1->id, 'guestvisible' => 1]);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $guest->id));
        $this->setUser($guest);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));

        // First visible item is used when there are multiple items.
        $item4 = $cataloggenerator->create_item(['sectionid' => $section2->id, 'type' => 'certification', 'referenceid' => $certification1->id]);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user1->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user2->id));
        $item1 = \tool_mucatalog\local\item\certification::archive($item1->id);
        $this->assertNull(certification::get_catalogue_item($certification1, $user1->id));
        $this->assertEquals($item4, certification::get_catalogue_item($certification1, $user2->id));
    }

    public function test_get_catalogue_item_tenant(): void {
        if (!\tool_mulib\local\mulib::is_mutenancy_available()) {
            $this->markTestSkipped('tenant support not available');
        }

        \tool_mutenancy\local\tenancy::activate();

        /** @var \tool_mutenancy_generator $tenantgenerator */
        $tenantgenerator = $this->getDataGenerator()->get_plugin_generator('tool_mutenancy');
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_mucatalog_generator $cataloggenerator */
        $cataloggenerator = $this->getDataGenerator()->get_plugin_generator('tool_mucatalog');

        $tenant1 = $tenantgenerator->create_tenant();
        $tenant2 = $tenantgenerator->create_tenant();

        $user1 = $this->getDataGenerator()->create_user(['tenantid' => $tenant1->id]);
        $user2 = $this->getDataGenerator()->create_user(['tenantid' => $tenant2->id]);
        $user3 = $this->getDataGenerator()->create_user();

        $catcontext1 = \context_coursecat::instance($tenant1->categoryid);
        $catcontext2 = \context_coursecat::instance($tenant2->categoryid);

        $certification1 = $generator->create_certification();
        $certification2 = $generator->create_certification();

        $section1 = $cataloggenerator->create_section(['uservisible' => 1, 'status' => \tool_mucatalog\local\util::STATUS_ACTIVE]);
        $item1 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification1->id]);

        $this->setUser($user1);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        $this->assertNull(certification::get_catalogue_item($certification2));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user1->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user2->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user3->id));
        \tool_mutenancy\local\tenancy::force_current_tenantid($tenant2->id);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        \tool_mutenancy\local\tenancy::unforce_current_tenantid();
        \tool_mutenancy\local\tenancy::force_current_tenantid(null);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        \tool_mutenancy\local\tenancy::unforce_current_tenantid();

        $certification1 = certification::move($certification1->id, $catcontext1->id);

        $this->setUser($user1);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification1, $user2->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user3->id));
        \tool_mutenancy\local\tenancy::force_current_tenantid($tenant2->id);
        $this->assertNull(certification::get_catalogue_item($certification1));
        \tool_mutenancy\local\tenancy::unforce_current_tenantid();
        \tool_mutenancy\local\tenancy::force_current_tenantid(null);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        \tool_mutenancy\local\tenancy::unforce_current_tenantid();

        $this->setUser($user2);
        $this->assertNull(certification::get_catalogue_item($certification1));
        $this->setUser($user3);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));

        $certification1 = certification::move($certification1->id, $catcontext2->id);

        $this->setUser($user1);
        $this->assertNull(certification::get_catalogue_item($certification1));
        $this->assertNull(certification::get_catalogue_item($certification1, $user1->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user2->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user3->id));
        \tool_mutenancy\local\tenancy::force_current_tenantid($tenant2->id);
        $this->assertEquals($item1, certification::get_catalogue_item($certification1));
        \tool_mutenancy\local\tenancy::unforce_current_tenantid();

        // Sections may be hidden from tenant members.
        $section1 = \tool_mucatalog\local\section::update((object)['id' => $section1->id, 'hiddenfromtenants' => 1]);
        $this->assertNull(certification::get_catalogue_item($certification1, $user1->id));
        $this->assertNull(certification::get_catalogue_item($certification1, $user2->id));
        $this->assertEquals($item1, certification::get_catalogue_item($certification1, $user3->id));
    }

    public function test_get_catalogue_item_url(): void {
        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_mucatalog_generator $cataloggenerator */
        $cataloggenerator = $this->getDataGenerator()->get_plugin_generator('tool_mucatalog');

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        $cohort1 = $this->getDataGenerator()->create_cohort();
        cohort_add_member($cohort1->id, $user2->id);

        $certification1 = $generator->create_certification();
        $certification2 = $generator->create_certification();

        $this->setUser($user2);
        $this->assertNull(certification::get_catalogue_item_url($certification1));

        $section1 = $cataloggenerator->create_section([
            'uservisible' => 0,
            'cohortvisible' => [$cohort1->id],
            'status' => \tool_mucatalog\local\util::STATUS_ACTIVE,
        ]);
        $item1 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification1->id]);

        $this->setUser($user1);
        $this->assertNull(certification::get_catalogue_item_url($certification1));
        $this->assertNull(certification::get_catalogue_item_url($certification2));

        $this->setUser($user2);
        $url = certification::get_catalogue_item_url($certification1);
        $this->assertInstanceOf(\core\url::class, $url);
        $this->assertSame("https://www.example.com/moodle/admin/tool/mucatalog/item.php?id=$item1->id", $url->out(false));
        $this->assertNull(certification::get_catalogue_item_url($certification2));
    }

    public function test_get_catalogue_actions(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_mucatalog_generator $cataloggenerator */
        $cataloggenerator = $this->getDataGenerator()->get_plugin_generator('tool_mucatalog');

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();

        $cohort1 = $this->getDataGenerator()->create_cohort();
        cohort_add_member($cohort1->id, $user1->id);

        $certification1 = $generator->create_certification();
        $certification2 = $generator->create_certification(['sources' => ['manual' => []]]);
        $certification3 = $generator->create_certification(['sources' => ['manual' => [], 'selfassignment' => []]]);
        $source3s = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification3->id, 'type' => 'selfassignment'], '*', MUST_EXIST);
        $certification4 = $generator->create_certification(['sources' => ['selfassignment' => [], 'approval' => []]]);
        $source4s = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification4->id, 'type' => 'selfassignment'], '*', MUST_EXIST);
        $source4a = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification4->id, 'type' => 'approval'], '*', MUST_EXIST);
        $certification5 = $generator->create_certification(['sources' => ['selfassignment' => []]]);

        $section1 = $cataloggenerator->create_section([
            'uservisible' => 0,
            'cohortvisible' => [$cohort1->id],
            'status' => \tool_mucatalog\local\util::STATUS_ACTIVE,
        ]);
        $item1 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification1->id]);
        $item2 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification2->id]);
        $item3 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification3->id]);
        $item4 = $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification4->id]);

        $this->setUser($user1);
        $this->assertSame([], certification::get_catalogue_actions($certification1));
        $this->assertSame([], certification::get_catalogue_actions($certification2));
        $actions = certification::get_catalogue_actions($certification3);
        $this->assertCount(1, $actions);
        $this->assertStringContainsString("/admin/tool/mucertify/my/source_selfassignment.php?sourceid=$source3s->id", $actions[0]);
        $actions = certification::get_catalogue_actions($certification4);
        $this->assertCount(2, $actions);
        $actions = implode('', $actions);
        $this->assertStringContainsString("/admin/tool/mucertify/my/source_selfassignment.php?sourceid=$source4s->id", $actions);
        $this->assertStringContainsString("/admin/tool/mucertify/my/source_approval_request.php?sourceid=$source4a->id", $actions);
        // Not in catalogue.
        $this->assertSame([], certification::get_catalogue_actions($certification5));

        // Section not visible.
        $this->setUser($user2);
        $this->assertSame([], certification::get_catalogue_actions($certification1));
        $this->assertSame([], certification::get_catalogue_actions($certification2));
        $this->assertSame([], certification::get_catalogue_actions($certification3));
        $this->assertSame([], certification::get_catalogue_actions($certification4));
        $this->assertSame([], certification::get_catalogue_actions($certification5));

        $this->setUser($user1);
        $certification3 = certification::archive($certification3->id);
        $this->assertSame([], certification::get_catalogue_actions($certification3));
    }

    public function test_get_tagged_certifications(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_mucatalog_generator $cataloggenerator */
        $cataloggenerator = $this->getDataGenerator()->get_plugin_generator('tool_mucatalog');

        $syscontext = \context_system::instance();

        $user1 = $this->getDataGenerator()->create_user();
        $user2 = $this->getDataGenerator()->create_user();
        $user3 = $this->getDataGenerator()->create_user();

        $category1 = $this->getDataGenerator()->create_category([]);
        $catcontext1 = \context_coursecat::instance($category1->id);

        $cohort1 = $this->getDataGenerator()->create_cohort();
        cohort_add_member($cohort1->id, $user2->id);
        cohort_add_member($cohort1->id, $user3->id);

        $certification1 = $generator->create_certification(['fullname' => 'Prvni']);
        $certification2 = $generator->create_certification(['fullname' => 'Druhy']);
        $certification3 = $generator->create_certification(['fullname' => 'Treti', 'sources' => ['manual' => []]]);
        $source3 = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification3->id, 'type' => 'manual'], '*', MUST_EXIST);
        $certification4 = $generator->create_certification(['fullname' => 'Ctvrty', 'contextid' => $catcontext1->id]);
        $certification5 = $generator->create_certification(['fullname' => 'Paty']);
        $certification6 = $generator->create_certification(['fullname' => 'Sesty', 'contextid' => $catcontext1->id, 'sources' => ['manual' => []]]);
        $source6 = $DB->get_record('tool_mucertify_source', ['certificationid' => $certification6->id, 'type' => 'manual'], '*', MUST_EXIST);

        \tool_mucertify\local\source\manual::assign_users($certification3->id, $source3->id, [$user3->id]);
        \tool_mucertify\local\source\manual::assign_users($certification6->id, $source6->id, [$user3->id]);

        $section1 = $cataloggenerator->create_section(['uservisible' => 1, 'status' => \tool_mucatalog\local\util::STATUS_ACTIVE]);
        $section2 = $cataloggenerator->create_section([
            'uservisible' => 0,
            'cohortvisible' => [$cohort1->id],
            'status' => \tool_mucatalog\local\util::STATUS_ACTIVE,
        ]);
        $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification1->id]);
        $cataloggenerator->create_item(['sectionid' => $section2->id, 'type' => 'certification', 'referenceid' => $certification2->id]);
        $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification3->id]);
        $cataloggenerator->create_item(['sectionid' => $section2->id, 'type' => 'certification', 'referenceid' => $certification4->id]);
        $cataloggenerator->create_item(['sectionid' => $section1->id, 'type' => 'certification', 'referenceid' => $certification5->id]);
        // Archived certifications cannot be added to catalogue.
        $certification3 = certification::archive($certification3->id);

        foreach ([$certification1, $certification2, $certification3, $certification4, $certification6] as $certification) {
            \core_tag_tag::set_item_tags('tool_mucertify', 'tool_mucertify_certification', $certification->id, $syscontext, ['Tag A']);
        }
        \core_tag_tag::set_item_tags('tool_mucertify', 'tool_mucertify_certification', $certification5->id, $syscontext, ['Tag B']);
        $taga = $DB->get_record('tag', ['rawname' => 'Tag A'], '*', MUST_EXIST);
        $tagb = $DB->get_record('tag', ['rawname' => 'Tag B'], '*', MUST_EXIST);

        $link = function (\stdClass $certification): string {
            return 'href="https://www.example.com/moodle/admin/tool/mucertify/my/certification.php?id=' . $certification->id . '"';
        };

        $this->setUser($user1);
        $result = certification::get_tagged_certifications($taga->id, true, 0, 10);
        $this->assertSame(1, $result['totalcount']);
        $this->assertStringContainsString($link($certification1), $result['content']);
        $this->assertStringContainsString('Prvni', $result['content']);
        $this->assertStringNotContainsString($link($certification2), $result['content']);
        $this->assertStringNotContainsString($link($certification3), $result['content']);
        $this->assertStringNotContainsString($link($certification4), $result['content']);
        $this->assertStringNotContainsString($link($certification5), $result['content']);
        $this->assertStringNotContainsString($link($certification6), $result['content']);
        $result = certification::get_tagged_certifications($tagb->id, false, 0, 10);
        $this->assertSame(1, $result['totalcount']);
        $this->assertStringContainsString($link($certification5), $result['content']);
        $this->assertStringNotContainsString($link($certification1), $result['content']);

        $this->setUser($user2);
        $result = certification::get_tagged_certifications($taga->id, true, 0, 10);
        $this->assertSame(3, $result['totalcount']);
        $this->assertStringContainsString($link($certification1), $result['content']);
        $this->assertStringContainsString($link($certification2), $result['content']);
        $this->assertStringNotContainsString($link($certification3), $result['content']);
        $this->assertStringContainsString($link($certification4), $result['content']);
        $this->assertStringNotContainsString($link($certification6), $result['content']);

        $this->setUser($user3);
        $result = certification::get_tagged_certifications($taga->id, true, 0, 10);
        $this->assertSame(4, $result['totalcount']);
        $this->assertStringContainsString($link($certification1), $result['content']);
        $this->assertStringContainsString($link($certification2), $result['content']);
        $this->assertStringNotContainsString($link($certification3), $result['content']);
        $this->assertStringContainsString($link($certification4), $result['content']);
        $this->assertStringContainsString($link($certification6), $result['content']);

        // Ordered by name with paging.
        $result = certification::get_tagged_certifications($taga->id, true, 1, 2);
        $this->assertSame(4, $result['totalcount']);
        $this->assertStringNotContainsString($link($certification4), $result['content']);
        $this->assertStringContainsString($link($certification2), $result['content']);
        $this->assertStringContainsString($link($certification1), $result['content']);
        $this->assertStringNotContainsString($link($certification6), $result['content']);

        $result = certification::get_tagged_certifications($tagb->id + 1000, true, 0, 10);
        $this->assertSame(['content' => '', 'totalcount' => 0], $result);
    }

    public function test_draft_program(): void {
        global $DB;

        /** @var \tool_mucertify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_mucertify');
        /** @var \tool_muprog_generator $programgenerator */
        $programgenerator = $this->getDataGenerator()->get_plugin_generator('tool_muprog');

        $program1 = $programgenerator->create_program(['sources' => ['mucertify' => []]]);
        $program2 = $programgenerator->create_program(['draft' => 1, 'sources' => ['mucertify' => []]]);

        try {
            $generator->create_certification(['programid1' => $program2->id]);
            $this->fail('Exception expected');
        } catch (\core\exception\moodle_exception $ex) {
            $this->assertInstanceOf(\core\exception\invalid_parameter_exception::class, $ex);
        }
        try {
            $generator->create_certification(['programid1' => $program1->id, 'recertify' => DAYSECS, 'programid2' => $program2->id]);
            $this->fail('Exception expected');
        } catch (\core\exception\moodle_exception $ex) {
            $this->assertInstanceOf(\core\exception\invalid_parameter_exception::class, $ex);
        }

        $certification = $generator->create_certification(['programid1' => $program1->id]);
        try {
            \tool_mucertify\local\certification::update_settings((object)['id' => $certification->id, 'programid1' => $program2->id]);
            $this->fail('Exception expected');
        } catch (\core\exception\moodle_exception $ex) {
            $this->assertInstanceOf(\core\exception\invalid_parameter_exception::class, $ex);
            $this->assertStringContainsString('Draft program cannot be used in certifications', $ex->getMessage());
        }
        $certification = $DB->get_record('tool_mucertify_certification', ['id' => $certification->id], '*', MUST_EXIST);
        $this->assertSame($program1->id, $certification->programid1);

        \tool_muprog\local\program::release($program2->id);
        $certification = \tool_mucertify\local\certification::update_settings(
            (object)['id' => $certification->id, 'programid1' => $program2->id]
        );
        $this->assertSame($program2->id, $certification->programid1);
    }
}
