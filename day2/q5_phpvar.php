<html>

<form action='q5_phpvar.php' method='GET'>
	<input type='number' name='side1'><br>
	<input type='number' name='side2'><br>
	<input type='number' name='side3'><br>
	<input type='submit' value='click here'>

</form>

</html>

<?php

$a=$_GET['side1'];
$b=$_GET['side2'];
$c=$_GET['side3'];

if($a and $b and $c)
	{
		if($a==$b and $b==$c)
		{
			echo "equilateral triangle";
		}
		else if($a==$b or $b==$c or $a==$c)
		{
			echo "isoceles triangle";
		}
		else
		{
			$comp=max($a,$b,$c);
			$res=theorem($comp,$a,$b,$c);	

			if($res==1)
			{
				echo "right angled triangle";
			}
			else
			{	
				echo"scalene triangle";
			}
		}
	}
else
{
	echo "incomplete entry";
}

function theorem($comp,$a,$b,$c)
{			
	$flag=0;
	if($comp==$a)
	{
		if(pow($comp,2)==pow($b,2)+pow($c,2))
			$flag=1;
	}
	else if($comp==$b)
	{
		if(pow($max,2)==pow($a,2)+pow($c,2))
			$flag=1;
	}
	else if($comp==$c)
	{
		if(pow($comp,2)==pow($a,2)+pow($b,2))
			$flag=1;			
	}
	return $flag;	
}

?>