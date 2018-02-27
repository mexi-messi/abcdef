<?php 

require_once(__DIR__ . '/../config.php');




require_login();
echo $OUTPUT->header();



global $DB, $USER,$COURSE;
?>

<?php
$ab = $_GET["id1"];


 
$deletedomain=$DB->delete_records('block_domainmodel',array('id'=>$ab));

if($deletedomain)
{
	
echo "deleted successfully !!! " ;

$url = $CFG->wwwroot.'/itec/domainmodel.php';
redirect($url, 'You will be redirected back', 1);

}
else
echo "Delete failed !!!";



?>




<?php

echo $OUTPUT->footer();
?>



