<?php 
require 'PHPMailerAutoload.php';
error_reporting(0);

if(isset($_REQUEST['submit']))
{	
	$name=stripslashes(trim(isset($_POST['name'])?$_POST['name']:''));
	$email=stripslashes(trim(isset($_POST['email'])?$_POST['email']:''));
	$contact=stripslashes(trim(isset($_POST['contact'])?$_POST['contact']:''));
	$usermessage=stripslashes(trim(isset($_POST['usermessage'])?$_POST['usermessage']:''));

	if($name!=''){
		$emails="amit.dubale10@gmail.com";
		$to  = 'amit.dubale10@gmail.com '; // note the comma		

			// subject
			$subject = 'Indeejio  Enquire From '.$name;

			// message
			$message = "<html><head><title>Indeejio</title></head><body><h3> Indeejio  Enquire </h3><table border='0'> <tr><td> Name : </td><td>".$name ."</td></tr><tr><td>Email  : </td><td>".$email ."</td></tr> <tr><td> Contact No: </td><td>".$contact."</td></tr><tr><td> Message : </td><td>".$usermessage."</td></tr> </html></body>";

			$mail = new PHPMailer;

			$mail->From = 'amit.dubale10@gmail.com';
			$mail->FromName = $name;
			$mail->addAddress('amit.dubale10@gmail.com', 'Indeejio  Enquire ');     // Add a recipient
			$mail->addCC('amit.dubale10@gmail.com', 'Indeejio Enquire ');
			$mail->addCC('amit.dubale10@gmail.com', 'Indeejio  Enquire ');
			$mail->addCC($email);
			$mail->addCC($emails);
			$mail->addCC($to);

			$mail->WordWrap = 150;                                 // Set word wrap to 50 characters
			//$mail->addAttachment($tmpName,$fileName);         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
		echo '<script>alert("Enquire Not Send Successfully ! Please Fill Proper Form.");</script>';	
		echo'<script>window.location="contactus.php";</script>'; // redriect	
			} else {
			echo '<script>alert("Thank You. We will call you shortly.");</script>';	
				echo'<script>window.location="contactus.php";</script>'; // redriect	
			}
		}
		else
		{
		//header('Location: index.php');
		echo '<script>alert("Enquire Not Send Successfully ! Please Fill Proper Form.");</script>';	
		echo'<script>window.location="contactus.php";</script>'; // redriect	
		}
}			
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<center><h3>Contact Form</h3></center>
	<div class="container">
	  <form role="form" action="contactus.php" name="submit" method="post">
		<label for="fname">Full Name</label>
		<input type="text" id="fname" name="name" placeholder="Your Full Name..">

		<label for="lname">Phone Number</label>
		<input type="text" id="lname" name="contact" placeholder="Your Phone Number..">
		
		<label for="lname">Email Id</label>
		<input type="text" id="lname" name="email" placeholder="Your Email Id..">

		<label for="addrress">Address</label>
		<textarea id="addrress" name="usermessage" placeholder="Write something.." style="height:200px"></textarea>

		<center><button type="submit" id="submit" name="submit">Send</button></center>
		
	  </form>
	</div>

</body>
</html>

