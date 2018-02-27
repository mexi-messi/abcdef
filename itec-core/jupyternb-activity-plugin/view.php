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
 * Prints a particular instance of jupyternb
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_jupyternb
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Replace jupyternb with the name of your module and remove this line.

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... jupyternb instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('jupyternb', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $jupyternb  = $DB->get_record('jupyternb', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $jupyternb  = $DB->get_record('jupyternb', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $jupyternb->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('jupyternb', $jupyternb->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_jupyternb\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $jupyternb);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/jupyternb/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($jupyternb->name));
$PAGE->set_heading(format_string($course->fullname));

/*
 * Other things you may want to set - remove if not needed.
 * $PAGE->set_cacheable(false);
 * $PAGE->set_focuscontrol('some-html-id');
 * $PAGE->add_body_class('jupyternb-'.$somevar);
 */

// Output starts here.
echo $OUTPUT->header();

// Conditions to show the intro can change to look for own settings or whatever.
if ($jupyternb->intro) {
    echo $OUTPUT->box(format_module_intro('jupyternb', $jupyternb, $cm->id), 'generalbox mod_introbox', 'jupyternbintro');
}

// Replace the following lines with you own code.
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <iframe src="https://nbviewer.jupyter.org/" height="800px" scrolling="yes" width="100%">
  </iframe> <br>


</body>
</html>


<?php

echo $OUTPUT->footer();
?>
