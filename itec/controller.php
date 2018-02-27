<?php 

require_once(__DIR__ . '/../config.php');

require_login();
echo $OUTPUT->header();

?>
<div class="controller">

<table>
	<tr>
		<th>Course Name </th>
		<th>Automation </th>
		<th>Manual </th>
	</tr>

	<tr>
		<td> Coursera<td>

		<input type="checkbox" name="gender" value="male"> Crawl on Schedule</input>

		<td><button>Crawl Now</button> </td>

		
		
	</tr>

	
	<tr>
		<td>edX<td>

		<input type="checkbox" name="gender" value="male"> Crawl on Schedule</input>

		<td><button>Crawl Now</button> </td>

		
		
	</tr>
	<tr>
		<td>Codecademy<td>

		<input type="checkbox" name="gender" value="male"> Crawl on Schedule</input>

		<td><a href="../itec/controllerfunction.php"><button>Crawl Now</button> </a> </td>

	</tr>
	<tr>
		<td>Tutorialspoint<td>

		<input type="checkbox" name="gender" value="male"> Crawl on Schedule</input>

		<td><button>Crawl Now</button> </td>
		<td><a href ="../itec/controllerfunction.php"><button>Settings</button> </a></td>
		
		
	</tr>

</table>

</div>



<html>
<head>
<style>

th{
	padding:10px 20px;

}

td{
padding:0px 10px 20px;

}


</style>
</head>

</html>








<?php

function PUBG()
{
	putenv("PYTHONPATH=/home/tma/anaconda3/lib/python3.5/site-packages");
	//echo $teo1 = system("ls");
	//echo $avzc = passthru("scrapy crawl coursera -a query='SQL' -o CourseraSQL.csv -t csv", $retval);
	//echo "<h1>$retval</h1>";

	//echo $asd= system("python control.py 2>&1");
	//echo "<h2>$retret</h2>";
	//echo $asssd= system("python controlsys.py 2>&1");
	//echo $teo3 = passthru("ls -al");
	//echo $teo4 = system("python3 test.py");
	echo $asssd= shell_exec("python3 control2.py 2>&1");

}

PUBG();


?>










<?php


echo $OUTPUT->footer();

?>


