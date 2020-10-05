<html>
	<form action='q3_file_upload.php' method='POST' enctype='multipart/form-data'>
		<input type='file' name='myfile'><p>
		<input type='submit'><p>
	</form>
</html>

<?php

if(isset($_FILES['myfile'])){
$error=$_FILES["myfile"]["error"];
	if($error==0){
		echo "name: ".$_FILES['myfile']["name"]."<br>";
		echo "type: ".$_FILES["myfile"]["type"]."<br>";
		echo "size: ".$_FILES["myfile"]["size"]."<br>";
		echo "temp: ".$_FILES["myfile"]["tmp_name"]."<br>";
	}
	else{
	echo "Error Encountered";
	}

}

?>