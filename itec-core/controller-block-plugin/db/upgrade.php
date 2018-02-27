<?php

function xmldb_qtype_myqtype_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    /// Add a new column newcol to the mdl_myqtype_options
    if ($oldversion < 2017051501) {
         if ($oldversion < 2017051501) {

        // Define field id to be added to block_controller.
        $table = new xmldb_table('block_controller');
        $field = new xmldb_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);

        // Conditionally launch add field id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Controller savepoint reached.
        upgrade_block_savepoint(true, 2017051501, 'controller');
    }

    }

    return true;
}

?>




















   
