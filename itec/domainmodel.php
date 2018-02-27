<?php 

require_once(__DIR__ . '/../config.php');




require_login();
echo $OUTPUT->header();



global $DB, $USER,$COURSE;
?>



<form method="post" action="domainmodel.php">



<?php
$query = "SELECT id, fullname from {course} where id!=1";
$user = $DB->get_records_sql($query);
?>
<h1>Select Course to be parent </h1>


<select class="classic" name="select1">

<?php

foreach ($user as $listofuser) {
	?>
	<option value="<?php echo  $listofuser->id;?>"><?php echo $listofuser -> fullname; ?> </option>
 
	

<?php
}
?>
</select>



<?php
$query = "SELECT id, fullname from {course} where id!=1";
$user = $DB->get_records_sql($query);
?>
<h1>Select prerequisite Course </h1>


<select class="classic" name="select2">

<?php

foreach ($user as $listofuser) {
	?>
	<option value="<?php echo  $listofuser->id;?>"><?php echo $listofuser -> fullname; ?> </option>
<?php
}

?>
</select>
<br>
<br>
<input type="submit" value="submit"/>
</form>
<?php
$a = $_POST["select1"];
$b = $_POST["select2"];

$del=$DB->delete_records('block_domainmodel',array('idcourse'=>$a, 'idpre'=>$b));




$incourse = new stdClass();

$incourse->idcourse  = $a;
$incourse->idpre = $b;
if ($a == $b)
	echo "Selected course and prerequisite course can't not be the same";
else
	$test = $DB->insert_record('block_domainmodel', $incourse);
?>



<?php
// out put list of domain model
/*
$takecourse = "SELECT cs1.fullname as name1
from {block_domainmodel} as dm1, {course} as cs1, {course} as cs2
where dm1.idcourse=cs1.id";




$takecourse1 = $DB->get_records_sql($takecourse);
*/
?>

<?php  
	$takecourse = "SELECT *
	from {block_domainmodel} as dm";

	$takecourse1 = $DB->get_records_sql($takecourse);


?>


<table border="2">
	<tr>
		<th>Course Name</th>
		<th>Prerequisite Course</th>
	</tr>
	<?php
		foreach($takecourse1 as $test){
	?>
	<tr>

			<td> <?php 
				$idcs = $test->idcourse;
				$queque = "select fullname from {course} where {course}.id=".$idcs;
	   			$takecourse2 = $DB->get_records_sql($queque);
				foreach($takecourse2 as $test2) {?>
				<?php	echo $test2->fullname; ?> <?php }  ?>
				
			</td>
			<td> <?php 
				$idpre = $test->idpre;   
				$queque2 = "select fullname from {course} where {course}.id=".$idpre;
	   			$takecourse3 = $DB->get_records_sql($queque2);
				foreach($takecourse3 as $test3) {?>
				<?php	echo $test3->fullname; ?> <?php } 

										?> 

			</td>
			<td>
				<a href="deletedomainmodel.php?id1=<?php echo $test->id?>">Delete </a>
			</td>
	</tr>

<?php	
}
?>


</table>






<html>
<head>







<iframe src="deepdream-master/dream.html" height="1000px" scrolling="yes" width="100%">
</iframe> <br><br>





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



