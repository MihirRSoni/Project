<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;      
require'../admin/assets/vendor/autoload.php';

  session_start(); 
  if(!empty($_SESSION)){
     header("Location: index.php");
  }
//print_r($_POST); die;
  $msend="";
  $isStatusError="";
  $isIdError="";
  $IsEmpty="";
if(!empty($_POST))
{
  $emailid=$_POST['emailid'];
  if($emailid==""){
    $IsEmpty="Compulsory to enter Email Id field.";
  }else{
          require 'dbcon\db_conn.php';
          $sql = "SELECT * FROM user WHERE emailid = '$emailid'";
  //echo $sql; die;
          $result = $conn->query($sql);
  //echo '<pre>';
  //print_r($result); die;
          if ($result->num_rows > 0) 
          {
      //echo '<pre>';
      //print_r($result->fetch_assoc()); die;
      // output data of each row
                $row = $result->fetch_assoc();
                $name= $row["fname"]." ".$row["lname"];
                $sql = "UPDATE user SET forget_pwd_link = '1' WHERE emailid='$emailid'";

                if ($conn->query($sql) === TRUE) 
                {
                  $encoded_emailid = base64_encode($emailid);
                  $email_link=$_SERVER['SERVER_ADDR'].'/Project/frontend/set_password.php?emailid='.$encoded_emailid;
                  $mail = new PHPMailer(true);
                try 
                {
                //Server settings
                //$mail->SMTPDebug = 2;                                  // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username ='charity.board2018@gmail.com';//'youremailaddress@gmail.com';                 // SMTP username
                $mail->Password ='admin.mrsoni01';//'yourgmailaccountpassword';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('charity.board2018@gmail.com', 'Charity Admin');
                $mail->addAddress($emailid, $name);     // Add a recipient
                                //$mail->addAddress('ellen@example.com');               // Name is optional
                                //$mail->addReplyTo('info@example.com', 'Information');
                                //$mail->addCC('cc@example.com');
                                //$mail->addBCC('bcc@example.com');

                                //Attachments
                                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'ForgetPassword';
                // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $massage="Hello $name, <br>Here Is your password reset link, please check."."<br><a href=".$email_link.">Reset Password</a>";
                $mail->Body    = $massage;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $msend='Your Mail Has been Send,Check your mailbox! ';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            }
                } 
                else
                {
                    echo "Error updating record: " . $conn->error;
                }
                
          }
            else
            {
               $isIdError="E-mail ID unavailable!";
               $isStatusError="";
            }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ForgetPassword</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../admin/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../admin/assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="login-box-body">

    <center><a class="logo" href="index.php"><img src="img/logo.png" alt="logo"></a></center>
    <h1><p class="login-box-msg" style="font-size: 20px;" >Enter Your Email Id And click on check button then check your mail box</p></h1>
    
    
    <?php
      if(!empty($_POST))
      {
          echo "<font style='background-color: rgb(255,0,0);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);'>".$IsEmpty." ".$isStatusError." ".$isIdError."</font>";
      }
      ?>
    <form action="" method="post">
      <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
      *</font>
      <font style=" font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">E-mail Id :</font>
      <div class="form-group has-feedback">
        <input type="email" name="emailid" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Check Mail</button>
        </div><br>
            <font style='background-color: rgb(0,255,0);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);'>
                <?php if(!empty($_POST)){echo $msend; }else{ echo $msend=""; } ?>
            </font> 
        <!-- /.col -->
      </div>
    </form>
    
    <!-- /.social-auth-links -->

    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../admin/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../admin/assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>