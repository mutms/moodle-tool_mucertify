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

namespace tool_mucertify\muform\tagarea;

use core\context;

/**
 * Certification tags, tag instances live in the system context.
 *
 * @package     tool_mucertify
 * @copyright   2026 Petr Skoda
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class certification extends \tool_mulib\muform\tagarea\base {
    /**
     * Constructor.
     *
     * @param int|null $certificationid null for new certification
     * @param int $contextid certification context, context of new certification
     */
    public function __construct(
        /** @var int|null certification id */
        private readonly ?int $certificationid,
        /** @var int certification context id */
        private readonly int $contextid
    ) {
        global $DB;
        if ($certificationid) {
            $certification = $DB->get_record('tool_mucertify_certification', ['id' => $certificationid], '*', MUST_EXIST);
            if ($certification->contextid != $contextid) {
                throw new \core\exception\invalid_parameter_exception('Certification context mismatch');
            }
        }
        require_capability('tool/mucertify:edit', context::instance_by_id($contextid));
    }

    #[\Override]
    public function get_args(): array {
        return [$this->certificationid, $this->contextid];
    }

    #[\Override]
    public function get_component(): string {
        return 'tool_mucertify';
    }

    #[\Override]
    public function get_itemtype(): string {
        return 'tool_mucertify_certification';
    }

    #[\Override]
    public function get_context(): context {
        return \core\context\system::instance();
    }

    #[\Override]
    public function get_itemid(): ?int {
        return $this->certificationid;
    }
}
