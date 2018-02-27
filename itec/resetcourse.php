<?php 

require_once(__DIR__ . '/../config.php');

require_login();
echo $OUTPUT->header();






?>

<?php
$csid = $_GET["csid"];
$usname = $_GET["usname"];



 
$ggg=$DB->delete_records('course_completion_crit_compl',array('course'=>$csid,'userid'=>$usname));




echo "deleted successfully !!! " ;

$url = $CFG->wwwroot.'/course/view.php?id='.$csid;
redirect($url, 'You will be redirected to your course', 3);

?>

<?php

echo $OUTPUT->footer();
?>


































<?php


echo $OUTPUT->footer();

?>
