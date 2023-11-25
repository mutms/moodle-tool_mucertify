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

/**
 * Certification upgrade.
 *
 * @package tool_certify
 * @author Andrew Hancox <andrewdchancox@googlemail.com>
 * @author Open Source Learning <enquiries@opensourcelearning.co.uk>
 * @link https://opensourcelearning.co.uk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2023, Andrew Hancox
 */
function xmldb_tool_certify_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2023112500) {

        // Define table tool_certify_src_commholds to be created.
        $table = new xmldb_table('tool_certify_src_commholds');

        // Adding fields to table tool_certify_src_commholds.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('userid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('quantity', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('holdkey', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('certificationid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table tool_certify_src_commholds.
        $table->add_key('id', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('userid', XMLDB_KEY_FOREIGN, ['userid'], 'user', ['id']);
        $table->add_key('certificationid', XMLDB_KEY_FOREIGN, ['certificationid'], 'tool_certify_certifications', ['id']);

        // Adding indexes to table tool_certify_src_commholds.
        $table->add_index('holdkey', XMLDB_INDEX_NOTUNIQUE, ['holdkey']);

        // Conditionally launch create table for tool_certify_src_commholds.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Certify savepoint reached.
        upgrade_plugin_savepoint(true, 2023112500, 'tool', 'certify');
    }

    return true;
}
