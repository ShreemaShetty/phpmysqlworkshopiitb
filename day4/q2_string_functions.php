<html>
	<form action='q2_string_functions.php' method='POST'>
		<label>Enter string to perform operations</label><br>
		<input type='text' name='string'><br>
		<input type='submit' name='submit' value='submit'><br>
	</form>
</html>

<?php

	if(isset($_POST['submit']))
	{
		$string=$_POST['string'];

		echo "Number of characters : ".strlen($string)."<br>";

		echo "Breaking down the string into an array : <br>";
		$pos=0;
		$exparray = explode(" ",$string);
		foreach ($exparray as $value){
			echo "value at position $pos: ".$value."<br>";
			$pos=$pos+1;
		}

		echo "Writing the string converted to array in the form of an array : <br>";
		$newstring = implode($exparray,",");
		echo "(".$newstring.")<br>";

		echo "Reverse of the string : ";
		echo strrev($string)."<br>";

		echo "Convert string to its lower case form : ";
		echo strtolower($string)."<br>";

		echo "Convert string to its upper case form : ";
		echo strtoupper($string)."<br>";

		echo "Declare a substring and replace the content of substring into original string.<br>";

		$replace="Alex";
		echo "Substring : ".$replace."<br>";
		echo "Original string : ".$string."<br>";
		$result=substr_replace($string,$replace,11,17);
		echo "Replaced string : ".$result."<br>";

	}
?>