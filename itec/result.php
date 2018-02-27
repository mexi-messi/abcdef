<?php 

require_once(__DIR__ . '/../config.php');

require_login();
echo $OUTPUT->header();

global $USER,$DB;
$userid = $USER->id;
?>




<!DOCTYPE html>
<html>
<head >
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="UTF-8">
</head>


<style>

#a:hover {
	color:white;
	background-color: #88b77b;
	border:#88b77b;
}
#a{
	text-align: center;
	padding: 5px 20px;
	background-color: white;
	border: 2px solid #f60;	
	border: ;

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

.progress-bar1 {
	width: 0;
	height: 100%;
	color: #fff;
	text-align: center;
	background-color: blue; 
}


.progress-bar2 {
	width: 0;
	height: 100%;
	color: #fff;
	text-align: center;
	background-color: red; 
}



.progress-bar3 {
	width: 0;
	height: 100%;
	color: #fff;
	text-align: center;
	background-color: pink; 
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


.zxc{
	padding: 20px 0px 20px 0px;

}
</style>
<body>

<div class="zxc">
<h1 style="text-align: center;"> Characteristic Quiz Result</h1>

</div>

<?php 
$query3 = "SELECT activist from {block_characteristictest} where userid=$userid";
$activist = $DB->get_records_sql($query3);
foreach($activist as $aaaaa)
$aaaa = $aaaaa->activist;

$aaaapercent = round (($aaaa / 6)*100);






$query4 = "SELECT reflector from {block_characteristictest} where userid=$userid";
$reflector = $DB->get_records_sql($query4);
foreach($reflector as $rrrrr)
$rrrr = $rrrrr->reflector;

$rrrrpercent =round( ($rrrr / 6)*100);









$query5 = "SELECT theorist from {block_characteristictest} where userid=$userid";
$theorist = $DB->get_records_sql($query5);
foreach($theorist as $ttttt)
$tttt = $ttttt->theorist;

$ttttpercent = round( ($tttt / 6)*100 ) ;












$query6 = "SELECT pragmatist from {block_characteristictest} where userid=$userid";
$pragmatist = $DB->get_records_sql($query6);
foreach($pragmatist as $ppppp)
$pppp = $ppppp->pragmatist;

$pppppercent = round (($pppp / 6)*100);











?>

<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $aaaapercent ?>%">
     <h5 style="color: white;font-weight: bold; ">Activist <?php echo $aaaapercent?>% </h5>
    </div>
  </div>

<div class="progress">
    <div class="progress-bar1" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $rrrrpercent ?>%">
      <h5 style="color: white;font-weight: bold; ">Reflector <?php echo $rrrrpercent?>% </h5>
    </div>
  </div>


<div class="progress" ">
    <div class="progress-bar2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $ttttpercent ?>%;">
      <h5 style="color: white;font-weight: bold; ">Theorist <?php echo $ttttpercent?>% </h5> 
    </div>
  </div>


<div class="progress">
    <div class="progress-bar3" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pppppercent ?>%">
      <h5 style="color: white;font-weight: bold; ">Pragmatist <?php echo $pppppercent?>% </h5>
    </div>
  </div>








</body>
</html>





<?php





echo $OUTPUT->footer();
?>


