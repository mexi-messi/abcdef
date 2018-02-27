<?php 
require_once(__DIR__ . '/../config.php');
require_login();
echo $OUTPUT->header();
global $USER,$DB;
?>

<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="UTF-8">
</head>
<body>
<?php
echo "<h1 style='text-align: center;'>You will be redirected to Result page in 5 seconds. </h1>";
echo "<br>";

/* for($k=1; $k<=24; $k++)
{
	
	${'question'.$k} = $_POST['question'.$k];
	echo 'Question'.$k.':' .${'question'.$k};	
	echo "<br>";
;
}

*/
echo "<br>";
echo "<br>";
$aaaa = 0;
$pppp = 0;
$tttt = 0;
$rrrr = 0;


	if ($_POST[question1] == a)
		$aaaa++;

	if ($_POST[question2] == a)
		$rrrr++;

if ($_POST[question3] == a)
		$aaaa++;

if ($_POST[question4] == a)
		$pppp++;

if ($_POST[question5] == a)
		$pppp++;

if ($_POST[question6] == a)
		$rrrr++;

if ($_POST[question7] == a)
		$tttt++;

if ($_POST[question8] == a)
		$aaaa++;

if ($_POST[question9] == a)
		$rrrr++;

if ($_POST[question10] == a)
		$tttt++;

if ($_POST[question11] == a)
		$pppp++;

if ($_POST[question12] == a)
		$tttt++;

if ($_POST[question13] == a)
		$pppp++;

if ($_POST[question14] == a)
		$rrrr++;

if ($_POST[question15] == a)
		$tttt++;

if ($_POST[question16] == a)
		$aaaa++;

if ($_POST[question17] == a)
		$pppp++;

if ($_POST[question18] == a)
		$rrrr++;


if ($_POST[question19] == a)
		$aaaa++;


if ($_POST[question20] == a)
		$tttt++;
if ($_POST[question21] == a)
		$tttt++;

if ($_POST[question22] == a)
		$rrrr++;
if ($_POST[question23] == a)
		$aaaa++;
if ($_POST[question24] == a)
		$pppp++;


/*
echo "Activist score: ".$aaaa; echo "<br>";
echo "Pragmatist score: ".$pppp;echo "<br>";
echo "Theorist score: ".$tttt;echo "<br>";
echo "Reflector score: ".$rrrr;echo "<br>";

*/

?>





<?php

/*
echo "Activist/Reflector";


$result;

echo 'so lan chon cau a: '.$a;
echo "<br>";
echo 'so lan chon cau b: '.$b;
echo "<br>";

if($a > $b) 
{
	$result= $a - $b;
	echo "ket qua la ".$result;
}
else
{
$result =$b - $a;
echo "ket qua la ".$result;

} 


echo "<br>";


echo "Sensing/Intuitive";

echo "<br>";
$a1=0;
$b1=0;
for($i1 =2; $i1<=42; $i1= $i1 +4){
	
if (${'question'.$i1} == "a") 
$a1++;
else
$b1++;

}
$result1;

echo 'so lan chon cau a: '.$a1;
echo "<br>";
echo 'so lan chon cau b: '.$b1;
echo "<br>";

if($a1 > $b1) 
{
	$result1= $a1 - $b1;
	echo "ket qua la ".$result1;
}
else
{
$result1 =$b1 - $a1;
echo "ket qua la ".$result1;

} 




echo "<br>";

echo "Visual/Verbal";


echo "<br>";
$a2=0;
$b2=0;
for($i2 =3; $i2<=43; $i2= $i2 +4){
	
if (${'question'.$i2} == "a") 
$a2++;
else
$b2++;

}
$result2;

echo 'so lan chon cau a: '.$a2;
echo "<br>";
echo 'so lan chon cau b: '.$b2;
echo "<br>";

	if($a2 > $b2) 
	{
		$result2= $a2 - $b2;
		echo "ket qua la ".$result2;
	}
	else
	{
		$result2 =$b2 - $a2;
		echo "ket qua la ".$result2;

	} 




echo "<br>";

echo "Sequential/Global";


echo "<br>";
$a3=0;
$b3=0;
for($i3 =4; $i3<=44; $i3= $i3 +4){
	
if (${'question'.$i3} == "a") 
$a3++;
else
$b3++;

}
$result3;

echo 'so lan chon cau a: '.$a3;
echo "<br>";
echo 'so lan chon cau b: '.$b3;
echo "<br>";

if($a3 > $b3) 
{
	$result3= $a3 - $b3;
	echo "ket qua la ".$result3;
}
else
{
$result3 =$b3 - $a3;
echo "ket qua la ".$result3;

} 

*/
$usertest = $USER->id;
$ggg=$DB->delete_records('block_progress',array('userid'=>$usertest));




?>

<?php 




$userla = $USER->id;

$record = new stdClass();
$record->userid  = $userla;
$record->activist = $aaaa;
$record->reflector = $pppp;
$record->theorist = $tttt;
$record->pragmatist  = $rrrr;
$lastinsertid = $DB->insert_record('block_progress', $record);


$url = $CFG->wwwroot.'/itec/result.php';
redirect($url, 'You will be redirected to your result page', 5);

?>



</body>



</html>
<?php
echo $OUTPUT->footer();
?>
