<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace tool_certify\local\source;

use enrol_programs\local\source\certify;
use tool_certify\local\assignment;
use tool_certify\local\notification_manager;
use html_writer;
use local_commerce\local\benefit;
use local_commerce\local\product;
use stdClass;
use tool_certify\local\period;

/**
 * Commerce source.
 *
 * @package tool_certify
 * @author Andrew Hancox <andrewdchancox@googlemail.com>
 * @author Open Source Learning <enquiries@opensourcelearning.co.uk>
 * @link https://opensourcelearning.co.uk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2023, Andrew Hancox
 */
final class ecommerce extends base {
    /**
     * Is commerce plugin installed and available.
     * @return bool
     */
    public static function is_commerce_available(): bool {
        if (!get_config('local_commerce', 'version')) {
            return false;
        }
        if (!class_exists(\local_commerce\local\util::class)) {
            return false;
        }
        return true;
    }

    /**
     * Is commerce plugin installed and available.
     * @return bool
     */
    public static function is_commerce_enabled(): bool {
        if (!self::is_commerce_available()) {
            return false;
        }
        return (bool)get_config('local_commerce', 'enablecommerce');
    }

    /**
     * Return short type name of source, it is used in database to identify this source.
     *
     * NOTE: this must be unique and it cannot be changed later
     *
     * @return string
     */
    public static function get_type(): string {
        return 'ecommerce';
    }

    /**
     * Can a new source of this type be added to programs?
     *
     * NOTE: Existing enabled sources in programs cannot be deleted/hidden
     * if there are any allocated users to program.
     *
     * @param stdClass $certification
     * @return bool
     */
    public static function is_new_allowed(\stdClass $certification): bool {
        if (!self::is_commerce_enabled()) {
            return false;
        }

        return parent::is_new_allowed($certification);
    }

    /**
     * Decode extra source settings.
     *
     * @param stdClass $source
     * @return stdClass
     */
    public static function decode_datajson(stdClass $source): stdClass {
        $source->ecommerce_maxusers = '';
        $source->ecommerce_allowsignup = 1;

        if (isset($source->datajson)) {
            $data = (object)json_decode($source->datajson);
            if (isset($data->maxusers) && $data->maxusers !== '') {
                $source->ecommerce_maxusers = (int)$data->maxusers;
            }
            if (isset($data->allowsignup)) {
                $source->ecommerce_allowsignup = (int)(bool)$data->allowsignup;
            }
        }

        return $source;
    }

    /**
     * Encode extra source settings.
     *
     * @param stdClass $formdata
     * @return string
     */
    public static function encode_datajson(stdClass $formdata): string {
        $data = ['maxusers' => null, 'key' => null, 'allowsignup' => 1];
        if (isset($formdata->ecommerce_maxusers)
            && trim($formdata->ecommerce_maxusers) !== ''
            && $formdata->ecommerce_maxusers >= 0) {

            $data['maxusers'] = (int)$formdata->ecommerce_maxusers;
        }
        if (isset($formdata->ecommerce_allowsignup)) {
            $data['allowsignup'] = (int)(bool)$formdata->ecommerce_allowsignup;
        }
        return \tool_certify\local\util::json_encode($data);
    }

    /**
     * Allocate users manually.
     *
     * @param int $certificationid
     * @param int $sourceid
     * @param array $userids
     * @param array $dateoverrides
     * @return void
     */
    public static function grantbenefit(int $certificationid, int $userid, array $dateoverrides = []): void {
        global $DB;

        $certification = $DB->get_record('tool_certify_certifications', ['id' => $certificationid], '*', MUST_EXIST);
        $source = $DB->get_record('tool_certify_sources', ['type' => static::get_type(), 'certificationid' => $certification->id], '*', MUST_EXIST);

        $user = $DB->get_record('user', ['id' => $userid, 'deleted' => 0], '*', MUST_EXIST);
        if ($assignment = $DB->get_record(
            'tool_certify_assignments',
            ['certificationid' => $certification->id, 'userid' => $user->id]
        )) {
            throw new \Exception('No support for repeat purchases or subscriptions as yet');
        } else {
            self::assign_user($certification, $source, $user->id, [], $dateoverrides);
            certify::sync_certifications($certificationid, $userid);
            notification_manager::trigger_notifications($certificationid, $userid);
        }
    }

    /**
     * Callback method for source updates.
     *
     * We never de-register the benefit handler as marking an allocation source as inactive feels
     * like a potentially temporary act.
     *
     * @param stdClass|null $oldsource
     * @param stdClass $data
     * @param stdClass|null $source
     * @return void
     */
    public static function after_update(?stdClass $oldsource, stdClass $data, ?stdClass $source): void {
        benefit::register('tool_certify', $source->certificationid);
    }

    /**
     * Returns list of actions available in Program catalogue.
     *
     * NOTE: This is intended mainly for students.
     *
     * @param stdClass $certification
     * @param stdClass $source
     * @return string[]
     */
    public static function get_catalogue_actions(\stdClass $certification, \stdClass $source): array {
        global $USER, $OUTPUT, $PAGE;

        $products = product::get_products_to_offer_for_sale('tool_certify', $certification->id, 0, false, $USER->id);

        if (empty($products)) {
            return [];
        }

        $retval = [];

        if (!empty($products)) {
            $output = html_writer::tag('legend', $OUTPUT->heading(get_string('purchaseaccess', 'tool_certify')));
            $output .= $PAGE->get_renderer('local_commerce')->render_products($products, false);

            $retval[] = $output;
        }

        return $retval;
    }
}