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

namespace tool_mucertify\local\form;

use stdClass;
use tool_mucertify\local\certification;
use tool_mulib\muform\element\dateinterval;
use tool_mulib\muform\element\select;

/**
 * Delays of certification settings: a "since" option and a single unit interval.
 *
 * Settings store delays as ['since' => option, 'delay' => 'P1Y'|'P2M'|'P3D'|'PT4H'|null],
 * the form uses elements NAME_since and NAME_delay.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait delay_trait {
    /**
     * Add delay elements.
     *
     * @param string $name
     * @param string $label
     * @param array $sinceoptions
     */
    protected function add_delay(string $name, string $label, array $sinceoptions): void {
        $since = new select("{$name}_since", $label, $sinceoptions);
        $since->set_required(true);
        $this->add($since);

        $delay = new dateinterval("{$name}_delay", get_string('delay', 'tool_mucertify'), ['y', 'm', 'd', 'h']);
        $delay->set_required_marker(true);
        $this->add($delay);
        $this->get_display_manager()->hide_if("{$name}_delay", "{$name}_since", 'eq', certification::SINCE_NEVER);
    }

    /**
     * Validate delay elements, the settings support one time unit only.
     *
     * @param array $data
     * @param string $name
     * @param array $allerrors
     */
    protected function validate_delay(array $data, string $name, array &$allerrors): void {
        if ($data["{$name}_since"] === certification::SINCE_NEVER) {
            return;
        }
        $delay = $data["{$name}_delay"];
        if ($delay === null) {
            $allerrors["{$name}_delay"][] = get_string('required');
        } else if (!preg_match('/^(P\d+[YMD]|PT\d+H)$/D', $delay)) {
            $allerrors["{$name}_delay"][] = get_string('delay_oneunit', 'tool_mucertify');
        }
    }

    /**
     * Current data of delay elements.
     *
     * @param string $name
     * @param array $value settings value with since and delay keys
     * @return array
     */
    public static function get_delay_current_data(string $name, array $value): array {
        return ["{$name}_since" => $value['since'], "{$name}_delay" => $value['delay']];
    }

    /**
     * Convert submitted delay elements to settings value.
     *
     * @param stdClass $data form data, modified
     * @param string $name
     */
    public static function apply_delay(stdClass $data, string $name): void {
        $since = $data->{"{$name}_since"};
        $data->$name = ['since' => $since, 'delay' => ($since === certification::SINCE_NEVER) ? null : $data->{"{$name}_delay"}];
        unset($data->{"{$name}_since"}, $data->{"{$name}_delay"});
    }
}
