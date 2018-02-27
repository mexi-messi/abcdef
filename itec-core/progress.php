<?php 

require_once(__DIR__ . '/../config.php');
require_login();
echo $OUTPUT->header();



global $DB, $USER,$COURSE;
$userid = $USER->id;
?>

<?php
//select number of course completion of current user id
$query1 = "SELECT course from {course_completion_crit_compl} where userid = $userid";
$coursecomplete = $DB->get_records_sql($query1);
?>

	
<?php
 $numberofcomplete =0;
foreach ($coursecomplete as $a) {
	?>


  <?php
	$a -> course;
	$numberofcomplete ++;
	


?> 

<?php ; }

 $numberofcomplete;
?>












<?php
//select number of course in moodle
$query2 = "SELECT id from {course}";
$number = $DB->get_records_sql($query2);
?>

	
<?php
 $numberofcourse =-1;
foreach ($number as $b) {
	?>


  <?php
	$b -> id;
	$numberofcourse ++;
	


?> 



<?php ;
}
 $numberofcourse;
?>

<?php
//calculate the progress
$progress =($numberofcomplete/ $numberofcourse)*100;

?>

































<html>

<style>
/*test css */


.container2{
	width:500px;
	display:block;
	margin:50px auto;
}
.progress {
	overflow: hidden;
	height: 20px;
	background-color: #ccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
		margin-bottom: 20px;
}
.progress-bar {
	width: 0;
	height: 100%;
	color: #fff;
	text-align: center;
	background-color: #609825;

	
 
}
.progress-striped .progress-bar {
			background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
			background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
			background-size: 40px 40px;
}
.progress.active .progress-bar {
	-webkit-animation: progress-bar-stripes 2s linear infinite;
	animation: progress-bar-stripes 2s linear infinite;
	-moz-animation: progress-bar-stripes 2s linear infinite;
}

</style>
<body>
<div class="container2" >    
                 
                    
                    	<h5 style="text-align:center"> PROGRESS BAR OF STUDENT </h5>
                    <div class="progress progress-striped">
		
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress?>%">
			<?php if($progress == 100)
				echo " 100% completed";
				else
				 echo $progress.'% complete';
			
			?>
                        
                      </div>
</div>
			</div></div>

<br>
</body>
</html>


















<?php

echo $OUTPUT->footer();
?>



