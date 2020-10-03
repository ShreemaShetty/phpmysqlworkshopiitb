<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="result";

$conn= mysqli_connect($servername,$username,$password,$dbname) or die(mysqli_connect_error());

echo "connected to database <br>"

?>