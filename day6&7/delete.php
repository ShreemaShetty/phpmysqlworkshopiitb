<?php
require('connect.php');
$student_id = $_GET['_id'];
$query = "DELETE FROM student WHERE id=$student_id"; 
$query2= "DELETE FROM marks WHERE student_id=$student_id";
$result = mysqli_query($conn,$query) or die ();
$result2 = mysqli_query($conn,$query2) or die ();
header("Location: adminhome.php"); 
?>
