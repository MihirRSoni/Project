<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'libraries/vendor/autoload.php';
require 'dbcon/db_conn.php';
if(!empty($_POST))
{
	$email_id = $_POST['email_id'];
	$query = $_POST['query'];
	$sql = "INSERT INTO contact (email_id, query)
		VALUES ('$email_id','$query')";

		if ($conn->query($sql) === TRUE) {
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try 
		{
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = ' smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'charity.board2018@gmail.com';                 // SMTP username
		    $mail->Password = 'admin.mrsoni01';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('charity.board2018@gmail.com', 'Charity Board');
		    $mail->addAddress($email_id, '');     // Add a recipient
		    $html = "<h1>Below is your query which you posted.</h1><p>Email: '$email_id'  <br> Query: '$query'</p>";
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Conact us query';
		    $mail->Body    = $html;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
			    header("Location: index.php");
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
?>