
<form action="q1_md5.php" method="POST">
	<label>Username</label>
	<input type="text" name="username"><p>
	<label>Password</label>
	<input type="text" name="password"><p>
	<input type="submit" name="submit" value="login"><p>			
</form>

<?php
$dbname="data1";

$conn= mysqli_connect("localhost","root","",$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{

	$username=$_POST['username'];
	$userpassword=$_POST['password'];
	$encuserpassword= md5($_POST['password']);
	
	$sql=mysqli_query($conn,"INSERT INTO login(username,encuserpassword) VALUES('$username','$encuserpassword')");
	
	if($sql){
		echo "Stored in database.";
	}
	else{
		echo "Not stored in database.";
	}
	
}
?>

