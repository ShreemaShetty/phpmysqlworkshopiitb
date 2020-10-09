<?php

	if($_POST['submit']){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		//enter email id of admin below
		$admin_email="";

		if($name&&$email&&$message)
		{
			$namelen=20;
			$messagelen=300;
			if( strlen($name)<=$namelen && strlen($message)<=$messagelen)
			{

				//set SMTP in php.ini
				ini_set("SMTP","smtp.gmail.com");

				//setup variable for user
				$to=$email;
				$subject="Email from PHPAcademy";
				$headers="From: admin@PHPAcademy.com";

				$body = "Thank you for the feedback";

				mail($to, $subject, $body);

				//setupvariable for admin
				$to_admin=$admin_email;
				$subject_admin="Feedback from PHPAcademy";
				$headers="From: feedback@PHPAcademy.com";

				$body_admin = "This is an email from $name\n\nEmail id: $email\n\nFeedback: $message";

				mail($to_admin, $subject_admin, $body_admin);


				die();

			}
			else
				die("Maxlength for name is ".$namelen." and maxlength for message is ".$messlen."<br>");

		}
		else

			die("All fields must be complete");
}

?>

<html>
	<form action='q2_send_mail.php' method='POST'>
		Name: <input type='text' name='name' maxlength='20'><p>
		Email: <input type='email' name='email'><p>
		Feedback: <textarea name='message'></textarea><p>
		<input type='submit' name='submit' value='Send feedback'><p>
		
	</form>
</html>