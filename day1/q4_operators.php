<?php 

$num1=readline("Enter first number: ");
$num2=readline("Enter second number: ");

if($num1>$num2)
	echo $num1." is the greater number";
else if($num1<$num2)
	echo $num2." is the greater number";
else
	echo "The two numbers are equal";

?>