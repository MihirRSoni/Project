<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;      
require'../admin/assets/vendor/autoload.php';
$ISMAILEXERROR="";
$mailerror="";
$numerror="";
       //if(empty($_POST)){
      
       //}
/*date_default_timezone_set("Asia/Kolkata");
date_default_timezone_get();//date("Y-m-d h:i:sA",$_SERVER['REQUEST_TIME'])/*"Asia/Calcutta");
$now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $now->format('Y-m-d h:i:sa')."<br>";    // MySQL datetime format
//echo $now->getTimestamp(); 
/*echo "<br>";
//date_default_timezone_set("Asia/Kolkata");
      $t=time();
      echo $ct=date("Y-m-d h:i:sa",$t)."<br>";
      echo date("d-M-Y D h:i:sA e P",$t)."<br>";
      echo date_default_timezone_set("Asia/Kolkata");
      echo "<pre>";
      print_r(getdate());
      echo gmdate("Y-m-d h:i:sa P",$t)."<br>";
//echo date($_SERVER['REQUEST_TIME']);*/
       if(!empty($_POST))
       {
  // header("location: validation.php")
              
  //die;
              $fname=$_POST['fname'];
              $lname=$_POST['lname'];
              $name=" ".$fname." ".$lname;
              $emailid=$_POST['emailid'];
              $pwd=$_POST['password'];
              $cpwd=$_POST['cpassword'];
              if($fname=="" || $lname=="" || $emailid=="" || $pwd=="" || $cpwd=="")
              {
                $validerror = "Compulsory to enter all the fields with *";
              }
              else
              {
                if (is_numeric($fname)|| is_numeric($lname)){
                  // $strerror="";
                  $numerror="name should consist alphabets!";
                }else{
                  $numerror="";
                }
                $validerror="";
                require'dbcon/db_conn.php';
              $check_mail="SELECT * FROM user WHERE emailid = '$emailid'";

              $rt = $conn->query($check_mail);
              if ($rt->num_rows > 0) {

                     $ISMAILEXERROR="Your Email Is Alredy access other account";

              }else{
                $ISMAILEXERROR="";
                     $password=$_POST['password'];
                     $cpassword=$_POST['cpassword'];
                     
                      if($password!=$cpassword){
                            
                            $ISPASSWORDERROR="Passwords are different";
                      }else{
                        $ISPASSWORDERROR="";
                            //header("location: ragister.php")
                            $role=1;//1=donor...2=NGO...3=admin
                            $status=1;//1=active...0=deactive  
      //if(){}
 
    
                            date_default_timezone_set("Asia/Kolkata");
                            $t=time();

                            $ct=date("d-M-Y D h:i:sa e P",$t);
      //ADD Database Connection...
                             /* echo $ct;
                             die;*/
      

                            $sql = "INSERT INTO `user`( `fname`,`lname`, `emailid`, `password`, `role`, `status`, `created`, `updated`) VALUES ('$fname','$lname' , '$emailid' , '$password' , '$role' ,'$status', '$ct','$ct' )";

                            if ($conn->query($sql) === TRUE) 
                            {
                                $mail = new PHPMailer(true);
                                try 
                                {
                                //Server settings 
                                $mail->SMTPDebug = 2;                                  // Enable verbose debug output
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
                                $mail->Subject = 'Here is the subject';
                                // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                                $query="Hello $name, Welcome to our site";
                                $mail->Body    = $query;
                                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                $mail->send();
                                echo 'Message has been sent';

                                header("Location: login.php");
                              
                                } catch (Exception $e) {
                                    $mailerror="Email Id Is Invalid!" ; 
                                }

                                   /*echo "New record created successfully";
                                   header("location: login.php");*/
                            }       
                            else 
                            {
                                   
                                   //"Error: " . $sql . "<br>" . $conn->error;
                            }
      //die;
                     }
    //die;
              }
              }
              
              
       }
?>
<!DOCTYPE html>
<html>
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <title>Registration</title>
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
                            <h1><p class="login-box-msg">Register Here</p></h1>
                            <?php 
                            if(!empty($_POST))
                            {
                              echo "<font style='background-color: rgb(255,0,0);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);''>".$ISMAILEXERROR.$validerror.$mailerror.$numerror."</font>";
                            }
                            else
                            {
                              echo $validerror = "";
                              echo $mailerror="";
                              echo $ISMAILEXERROR="";
                            }
                            ?>
                            <form action="" method="post">
                              <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>
                                   <font style=" font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">First Name :</font>
                                   <div class="form-group has-feedback">
                                          <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                   </div>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Last Name :</font>
                                   <div class="form-group has-feedback">
                                          <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                   </div>

                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>     
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Email Id :</font>
                                   
                                   <div class="form-group has-feedback">
                                          <input type="email" name="emailid" class="form-control" placeholder="Email">
                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                   </div>
                                    <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Password:</font>
                                   <div class="form-group has-feedback">
                                          <input type="password" name="password" class="form-control" placeholder="Password">
                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                   </div>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>      
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Conform Password:</font>
                                   
                                   <div class="form-group has-feedback">
                                          <input type="password" name="cpassword" class="form-control" placeholder="Conform Password">
                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                   </div>
      
                                   <div class="row">
              <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
                                          <div class="col-xs-4">
                                                 <button type="submit" class="btn btn-primary btn-block btn-flat">Sign up</button>
                                          </div>
                                           <div class="col-xs-4">
                                            <a href="login.php">
                                                 <button type="button" class="btn btn-primary btn-block btn-flat"><font color="white"> Login</font></button></a>
                                          </div>
        <!-- /.col -->
                                   </div>
                            </form>

    
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.php" class="text-center">Register a new membership</a> -->

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

