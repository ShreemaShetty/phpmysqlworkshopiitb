<?php

$pos=0;

$mat=array(

"mat1"=>array(1,2,3,4),
"mat2"=>array(5,6,7,8)

);

echo ($mat["mat1"][$pos]+$mat["mat2"][$pos])." ".
	($mat["mat1"][$pos+1]+$mat["mat2"][$pos+1])."<br>".
	($mat["mat1"][$pos+2]+$mat["mat2"][$pos+2])." ".
	($mat["mat1"][$pos+3]+$mat["mat2"][$pos+3])."<br>";

?>