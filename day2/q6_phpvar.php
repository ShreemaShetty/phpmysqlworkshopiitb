<html>

<form action='q6_phpvar.php' method='POST'>
	<label>Name:</label>
	<input type='text' name='studentname'><br>
	<label>Enter marks</label><br>
	<label>Subject 1:</label>
	<input type='number' name='s1' min=0 max='100'> /100<br>
	<label>Subject 2:</label>
	<input type='number' name='s2' min=0 max='100'> /100<br>
	<label>Subject 3:</label>
	<input type='number' name='s3' min=0 max='100'> /100<br>
	<label>Subject 4:</label>
	<input type='number' name='s4' min=0 max='100'> /100<br>
	<label>Subject 5:</label>
	<input type='number' name='s5' min=0 max='100'> /100<br>
	<input type='submit' value='submit'>

</form>

</html>

<?php

$outof=100;

$name=$_POST['studentname'];
$sub1=$_POST['s1'];
$sub2=$_POST['s2'];
$sub3=$_POST['s3'];
$sub4=$_POST['s4'];
$sub5=$_POST['s5'];

function calc($sub1,$sub2,$sub3,$sub4,$sub5)
{
	$total=$sub1+$sub2+$sub3+$sub4+$sub5;
	return $total;
}


if($name and $sub1 and $sub2 and $sub3 and $sub4 and $sub5)
{
	echo "Name of Student: ".$name."<br>";
	echo "Marks in Each Subject <br>";
	echo "Subject 1: ".$sub1."/$outof<br>";
	echo "Subject 2: ".$sub2."/$outof<br>";
	echo "Subject 3: ".$sub3."/$outof<br>";
	echo "Subject 4: ".$sub4."/$outof<br>";
	echo "Subject 5: ".$sub5."/$outof<br>";
	echo "Total Marks Obtained: ";
	echo calc($sub1,$sub2,$sub3,$sub4,$sub5)."<br>";
	echo "Total: ".($outof*5)."<br>";	
	echo "Percentage: ".((calc($sub1,$sub2,$sub3,$sub4,$sub5)/($outof*5))*100)."%";
}
else
{
	echo "incomplete entry";
}

?>