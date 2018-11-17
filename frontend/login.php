<?php 
  session_start(); 
  if(!empty($_SESSION)){
     header("Location: index.php");
  }
//print_r($_POST); die;
  $isStatusError="";
  $isIdError="";
  $IsEmpty="";
if(!empty($_POST))
{
  $email=$_POST['emailid'];
  $pwd=$_POST['password'];
  if($email=="" && $pwd==""){
    $IsEmpty="Compulsory to enter all the fields with *";
  }else{
          require 'dbcon/db_conn.php';
          $sql = "SELECT * FROM user WHERE emailid = '$email' AND password = '$pwd' ";
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
               
               $role=$row["role"];
               $status=$row["status"];
      // echo "<pre>";
      //         print_r($row);die;
               if($status==0)
               {
                    $isStatusError="You have not parmition to login by admin!";
                    //$isIdError="";
               }
               elseif($role==1)//donor
               {
                    /*echo "string";
                    die;*/
                    $_SESSION['id']=$row["id"];
                    $name= $row["fname"]." ".$row["lname"];
                    $_SESSION['name']=$name;
                    $_SESSION['emailid']=$row["emailid"];
                    $_SESSION['role']=1;
                    // header("Location: index.php");
                    ?>
                    <meta http-equiv="refresh" content="2;url=index.php" />
                    <?php

               }
               elseif ($role==2) //ngo
               {
                  $_SESSION['id']=$row["id"];
                    $name= $row["fname"]." ".$row["lname"];
                    $_SESSION['name']=$name;
                    $_SESSION['emailid']=$row["emailid"];
                    $_SESSION['role']=2;
                    // header("Location: index.php");
                    ?>
                    <meta http-equiv="refresh" content="2;url=index.php" />
                    <?php
               }
               elseif ($role==3) //admin
               {
                    $_SESSION['adminid']=$row["id"];
                    $name= $row["fname"]." ".$row["lname"];
                    $_SESSION['adminname']=$name;
                    $_SESSION['adminemailid']=$row["emailid"];
                    $_SESSION['role']=3;
                    
                    // header("Location: ../admin/index.php");
                    ?>
                    <meta http-equiv="refresh" content="2;url=../admin/index.php" />
                    <?php
               }
          }
          else
          {
               $isIdError="E-mail ID or Password unavailable!";
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
  <title>Log in</title>
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
    <h1><p class="login-box-msg">Login Here...</p></h1>
    
    
    <?php
      if(!empty($_POST))
      {
          echo "<font style='background-color: rgb(255,0,0);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);''>".$IsEmpty." ".$isStatusError." ".$isIdError."</font>";
      }
      else
      {
        echo $isStatusError = "";
        echo $isIdError = "";
        echo $IsEmpty="";
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
      <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
      *</font>
      <font style=" font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Password :</font>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    
    <!-- /.social-auth-links -->

    <a href="forgetpassword.php">I forgot my password</a><br>
    <a href="register.php" class="text-center">Register a new membership</a>

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