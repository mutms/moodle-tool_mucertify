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

namespace tool_certify\local\source;

use tool_certify\local\certification;
use local_commerce\local\benefit;

/**
 * Commerce allocation source test.
 *
 * @group openlms
 *
 * @package tool_certify
 * @author Andrew Hancox <andrewdchancox@googlemail.com>
 * @author Open Source Learning <enquiries@opensourcelearning.co.uk>
 * @link https://opensourcelearning.co.uk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2023, Andrew Hancox
 *
 * @covers \tool_certify\local\source\ecommerce
 */
final class ecommerce_test extends \advanced_testcase {
    public function setUp(): void {
        $this->resetAfterTest();
        \local_commerce\local\util::enable_commerce();
    }

    public function test_get_type() {
        $this->assertSame('ecommerce', ecommerce::get_type());
    }

    public function test_is_new_alloved() {
        /** @var \tool_certify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_certify');
        $certification = $generator->create_certification();

        $this->assertTrue(ecommerce::is_new_allowed($certification));

        \local_commerce\local\util::disable_commerce();
        $this->assertFalse(ecommerce::is_new_allowed($certification));
    }

    public function test_benefit_registration() {
        /** @var \tool_certify_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('tool_certify');

        $this->assertFalse(benefit::get_record(['pluginname' => 'tool_certify']));

        $certification1 = $generator->create_certification(['sources' => ['ecommerce' => []]]);

        ecommerce::update_source((object)[
            'certificationid' => $certification1->id,
            'type' => 'ecommerce',
            'enable' => 1,
            'ecommerce_maxusers' => 2,
        ]);

        $benefit = benefit::get_record(['pluginname' => 'tool_certify']);
        $this->assertEquals($certification1->id, $benefit->get('instance'));
    }
}
