<?php 

require_once(__DIR__ . '/../config.php');

require_once($CFG->dirroot . '/my/lib.php');


require_login();
echo $OUTPUT->header();



global $DB, $USER;


// out put database table
$query = "SELECT id, username,email from {user}";
$user = $DB->get_records_sql($query);
?>
<table border="2">
	<tr>
		<th> ID </th>
		<th> UserName </th>
		<th> EMAIL </th>
	</tr>
<?php

foreach ($user as $listofuser) {
	?>

<tr>
  <td><?php echo  $listofuser->id;?> </td>
 


	<td><?php echo $listofuser -> username; ?> </td>
	 <td><?php echo  $listofuser->email;?> </td>
	
</tr>

<?php
}
?>
	</table>

<?php



// get current user id
 $userid = $USER->id;
?>



<?php
//select number of course completion of current user id
$query1 = "SELECT course from {course_completions} where userid = $userid";
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
 


	


<?php ;
}
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

<?php 


putenv('PYTHONPATH=/home/tma/anaconda3/lib/python3.5/site-packages');
$result22 =  passthru("python3 thang.py");
echo $result22; 








?>



</head>
<body>







	











<!DOCTYPE html>
<html>
<head >
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />



  
<title>Test Family Tree</title>
<!-- I found and adapted this css code from: https://stackoverflow.com/questions/38192074/family-tree-css -->
<!-- There is also an example on codepen.io at: http://codepen.io/Pestov/pen/BLpgm -->
<!-- I am not sure who the original creator is -->











<style>
/*test checkbox css */

 /* Customize the label (the container) */
.container1 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
} 


/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}


/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

.table134 {
	border: 2px solid black;
	background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

}



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



/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
 
</head>
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










 
<!--
We will create a family tree using just CSS(3)
The markup will be simple nested lists
-->

<div class='card-block'>
<div class="tree">
	<ul>
		<li>
			<a href="http://localhost/moodle">data science </a>
			<ul>
				<li>
					<a href="#">php</a>
					<ul>
						<li>
							<a href="#">mysql</a>
						</li>
					</ul>
				</li>
	

				<li>
						
					<a href="#">python </a>
					<a href="#">machine learning </a>
					<ul>
						
						<li><a href="#">java </a></li>
						<li>
							<a href="#"> html5 </a>
							<ul>
								<li>
									<a href="#">css</a>
								</li>
								<li>
									<a href="#">node js</a>
								</li>
								<li>
									<a href="#">Lahouse </a>
								</li>
							</ul>
						</li>
						<li><a href="#">ruby </a></li>
					</ul>
				</li>
					


			</ul>
		</li>
	</ul>
</div>
</div>
 
 <form action="function.php" method="post">

	<label class="container1"><input type="checkbox" name="question1" value="a" ><span class="checkmark"></span> Question 1. I find it easy to meet new people and make new friends</label>
  <br>
 <br>

	<label class="container1"><input type="checkbox" name="question2" value="a" ><span class="checkmark"></span>Question 2. I am cautious and thoughtful </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question3" value="a" ><span class="checkmark"></span>Question 3. I get bored easily </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question4" value="a" ><span class="checkmark"></span>Question 4. I am a practical, "hands on" kind of person </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question5" value="a" ><span class="checkmark"></span>Question 5. I like to try things out for myself </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question6" value="a" ><span class="checkmark"></span>Question 6. My friends consider me to be a good listener </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question7" value="a" ><span class="checkmark"></span>Question 7. I have clear ideas about the best way to do things </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question8" value="a" ><span class="checkmark"></span>Question  8. I enjoy being the centre of attention </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question9" value="a" ><span class="checkmark"></span>Question 9. I am a bit of a daydreamer </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question10" value="a" ><span class="checkmark"></span>Question 10. I keep a list of things to do </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question11" value="a" ><span class="checkmark"></span>Question 11. I like to experiment to find the best way to do things </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question12" value="a" ><span class="checkmark"></span>Question 12. I prefer to think things out logically </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question13" value="a" ><span class="checkmark"></span>Question 13. I like to concentrate on one thing at a time </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question14" value="a" ><span class="checkmark"></span>Question 14. People sometimes think of me as shy and quiet </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question15" value="a" ><span class="checkmark"></span>Question 15. I am a bit of a perfectionist </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question16" value="a" ><span class="checkmark"></span>Question 16. I am enthusiastic about life </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question17" value="a" ><span class="checkmark"></span>Question 17. I would rather "get on with the job" than keep talking about it </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question18" value="a" ><span class="checkmark"></span>Question 18. I often notice things that other people miss </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question19" value="a" ><span class="checkmark"></span>Question 19. I act first then think about the consequences later </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question20" value="a" ><span class="checkmark"></span>Question 20. I like to have everything in its "proper place" </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question21" value="a" ><span class="checkmark"></span>Question 21. I ask lots of questions </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question22" value="a" ><span class="checkmark"></span>Question 22. I like to think things through before getting involved </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question23" value="a" ><span class="checkmark"></span>Question 23. I enjoy trying out new things </label> <br>
 <br>

<label class="container1"><input type="checkbox" name="question24" value="a" ><span class="checkmark"></span>Question 24. I like the challenge of having a problem to solve </label> <br>
 <br>



<button> <input type="submit" value="submit"></button>








</form> 



</body>
</html>


<?php

echo $OUTPUT->footer();
?>
