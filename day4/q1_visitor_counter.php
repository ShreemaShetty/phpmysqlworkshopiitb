<html>

<form action='q1_visitor_counter.php' method='POST'>
	<input type='submit' name='submit' value='view count'><br>
</form>

</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="result";

$conn= mysqli_connect($servername,$username,$password,$dbname) or die(mysqli_connect_error());

if(!$conn){
	echo " not connected to database <br>";
}
else{
	echo "connected to database <br>";
}

	if(isset($_POST['submit'])){

	$store=mysqli_query($conn,"UPDATE counter SET count=count+1 WHERE id=1");

	$extract=mysqli_query($conn,"SELECT count FROM counter WHERE id=1");

	if(mysqli_num_rows($extract)>0){

		$row=mysqli_fetch_assoc($extract);
		$visitors=$row['count'];
		}
		
		echo "You've had $visitors visitors.";

	}
mysqli_close($conn);
?>