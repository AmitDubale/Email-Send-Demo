<?php 
$page="contact";


require 'PHPMailerAutoload.php';
error_reporting(0);
if(isset($_REQUEST['submit']))
{	

$name=stripslashes(trim(isset($_POST['name'])?$_POST['name']:''));
$email=stripslashes(trim(isset($_POST['email'])?$_POST['email']:''));
$contact=stripslashes(trim(isset($_POST['contact'])?$_POST['contact']:''));
$usermessage=stripslashes(trim(isset($_POST['usermessage'])?$_POST['usermessage']:''));

		if($name!=''){
			$emails="info@indeejio.com";
				$to  = 'contact@indeejio.com '; // note the comma		

				// subject
				$subject = 'Indeejio  Enquire From '.$name;

				// message
				$message = "<html><head><title>Indeejio</title></head><body><h3> Indeejio  Enquire </h3><table border='0'> <tr><td> Name : </td><td>".$name ."</td></tr><tr><td>Email  : </td><td>".$email ."</td></tr> <tr><td> Contact No: </td><td>".$contact."</td></tr><tr><td> Message : </td><td>".$usermessage."</td></tr> </html></body>";

					$mail = new PHPMailer;

					$mail->From = 'info@indeejio.com';
					$mail->FromName = $name;
					$mail->addAddress('info@indeejio.com', 'Indeejio  Enquire ');     // Add a recipient
					$mail->addCC('amit.dubale10@gmail.com', 'Indeejio Enquire ');
					$mail->addCC('ask2new@gmail.com', 'Indeejio  Enquire ');
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
				echo'<script>window.location="contact.php";</script>'; // redriect	
					} else {
					echo '<script>alert("Thank You. We will call you shortly.");</script>';	
						echo'<script>window.location="contact.php";</script>'; // redriect	
					}
				}
				else
				{
				//header('Location: index.php');
				echo '<script>alert("Enquire Not Send Successfully ! Please Fill Proper Form.");</script>';	
				echo'<script>window.location="contact.php";</script>'; // redriect	
				}
	}			

?>

	
	<!-- Start Page Banner -->
    <div class="page-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 style="text-align:left;color:#fff;">CONTACT US</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="#">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start Content -->
    <div id="content">
      <div class="container">

        <div class="row">
		
			<div class="col-md-6">

				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Information</span></h4>

				<!-- Some Info -->
				<p>Welcome to Indeejio Services LLP, </p>

				<!-- Divider -->
				<div class="hr1" style="margin-bottom:10px;"></div>

				<!-- Info - Icons List -->
				<ul class="icons-list">
				  <li><i class="fa fa-globe">  </i> <strong>Address:</strong> 1234 Street Name, Bangladesh.</li>
				  <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> contact@indeejio.com</li>
				  <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> contact@indeejio.in</li>
				  <li><i class="fa fa-mobile"></i> <strong>Phone:</strong> +12 345 678 001</li>
				  <li><i class="fa fa-mobile"></i> <strong>Mobile:</strong> +91 9191919191</li>
				</ul>

				<!-- Divider -->
				<div class="hr1" style="margin-bottom:15px;"></div>

				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Working Hours</span></h4>

				<!-- Info - List -->
				<ul class="list-unstyled">
				  <li><strong>Monday - Sunday</strong> - 9am to 10pm</li>
				</ul>

			</div>

			<div class="col-md-6">
			
				 <!--End Classic Heading -->
				<div class="panel panel-default">
				  <div class="panel-body"><strong>Contact Us</strong></div>
				  <div class="panel-footer">
					<!-- Start Contact Form -->
				<form role="form" class="contact-form" action="contact.php" id="contact-form" method="post">
				  <div class="form-group">
					<div class="controls">
					  <input type="text" placeholder="Name" name="name" required="required">
					</div>
				  </div>
				  <div class="form-group">
					<div class="controls">
					  <input type="email" class="email" placeholder="Email" name="email" required="required">
					</div>
				  </div>
				  <div class="form-group">
					<div class="controls">
					  <input type="text" class="requiredField" placeholder="Contact No" name="contact" required="required">
					</div>
				  </div>

				  <div class="form-group">

					<div class="controls">
					  <textarea rows="4" placeholder="Message" name="usermessage" required="required"></textarea>
					</div>   
					    
				  </div><center>
				  <button type="submit" id="submit" name="submit" class="btn-system btn-large btn-center">Send</button></center>
				  <div id="success" style="color:#34495e;"></div>
				</form>
				<!-- End Contact Form -->
				  </div>
				</div>
				<!--End Classic Heading -->
            </div>


        </div>

      </div>
    </div>
    <!-- End content -->
<?php require_once('module/footer.php'); ?>

<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$to = 'hello@gmail.com';
$message = 'FROM: '.$name.' Email: '.$email.'Message: '.$message;
$headers = 'From: youremail@domain.com' . "\r\n";
 
if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // this line checks that we have a valid email address
mail($to, $subject, $message, $headers); //This method sends the mail.
echo "Your email was sent!"; // success message
}else{
echo "Invalid Email, please provide an correct email.";
}

?>


   