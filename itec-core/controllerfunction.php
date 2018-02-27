<?php 

require_once(__DIR__ . '/../config.php');

require_login();
echo $OUTPUT->header();

global $DB, $USER,$COURSE;
?>
<form method="post" action="controllerfunction.php">
<h1>Select Provider</h1>
<select class="classic" name="select1">

	<option value="tutorial">asgasg</option>
	<option value="point">as345</option>
</select>


<h1>course keyword </h1>


<input name="select2" id="select2" type="text"/>

<br>
<br>
<input type="submit" value="submit"/>

</form>

<?php

$provider = $_POST["select1"];
$courseurl = $_POST["select2"];

$delete1=$DB->delete_records('block_controller',array('provider_name'=>$provider, 'course_url'=>$courseurl));

$kimjongun = new stdClass();

$kimjongun->provider_name  = $provider;
$kimjongun->course_url = $courseurl;
$test13 = $DB->insert_record('block_controller', $kimjongun);
?>























<html>
<head>












<style>
.a{
	padding: 50px;
	text-align: center;

}

select {

  /* styling */
  background-color: white;
  border: thin solid green;
  border-radius: 4px;
  display: inline-block;
  font: inherit;
  line-height: 1.5em;
  padding: 0.5em 3.5em 0.5em 1em;

  /* reset */

  margin: 0;      
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
}


/* arrows */

select.classic {
  background-image:
    linear-gradient(45deg, transparent 50%, green 50%),
    linear-gradient(135deg, green 50%, transparent 50%),
    linear-gradient(to right, lightgreen, lightgreen);
  background-position:
    calc(100% - 20px) calc(1em + 2px),
    calc(100% - 15px) calc(1em + 2px),
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
}

select.classic:focus {
  background-image:
    linear-gradient(45deg, white 50%, transparent 50%),
    linear-gradient(135deg, transparent 50%, white 50%),
    linear-gradient(to right, gray, gray);
  background-position:
    calc(100% - 15px) 1em,
    calc(100% - 20px) 1em,
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
  border-color: grey;
  outline: 0;
}


</style>
</head>
</html>









<?php
echo $OUTPUT->footer();

?>
