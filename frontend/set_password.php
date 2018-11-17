<?php
$emailid="";
if(isset($_GET['emailid'])){
$emailid=$_GET['emailid'];
$emailid = base64_decode($emailid);
}
/*echo "<pre>";
print_r($emailid);die;	*/
require 'dbcon\db_conn.php';
if(!empty($_POST))
{
  $pwd=$_POST['password'];
  $cpwd=$_POST['password'];
  if($pwd=="" && $cpwd==""){
    $IsEmpty="Compulsory to enter all the fields with *";
   }
   else{
     $sql = "SELECT * FROM user WHERE emailid ='".$emailid."'";
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
            $fname=$row['fname'];
            $lname=$row['lname'];
            $emailid=$row['emailid'];
            $cn=$row['cno'];
            $role=$row['role'];//1=donor...2=NGO...3=admin
            $status=$row['status'];//1=active...0=deactive  
              //$ctt=row
              // $cpwd=$_POST['cpassword'];
            te_default_timezone_set("Asia/Kolkata");
            $t=time();
            $ct=date("d-M-Y D h:i:sa e P",$t);
            $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`emailid`='$emailid',`cno`='$cn',`role`='$role',`status`='$status',`created`=,`updated`='$ct' WHERE `id` = ".$_SESSION['id']."";
    }
  }
}
$IsEmpty="";
$sql = "SELECT * FROM user WHERE emailid ='".$emailid."' AND forget_pwd_link = 1 ";
$result = $conn->query($sql);
  //echo '<pre>';
  //print_r($result); die;
  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $forget_pwd_link=$row['forget_pwd_link'];
    if($forget_pwd_link == 1)
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body bgcolor=""><center>
<form>
	<table>
		<tr>
			<td>Your User-Id</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;<font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0); background-color: rgb(0,0,0);"><input type="text" value="<?php echo $emailid; ?>" readonly></font></td></tr>
	<tr><td><font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">*</font>
	Enter Your New Password </td> <td>&nbsp;&nbsp;:&nbsp;&nbsp;<input type="password" name="pwd" ></td> </tr>
	<tr> <td> <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">*</font> Conform Password </td> <td>&nbsp;&nbsp;:&nbsp;&nbsp;<input type="password" name="cpwd" ></td></tr>
	<tr><td>
	<div class="col-xs-4">
    	<button type="submit" class="btn btn-primary btn-block btn-md" style="width: 70px;">Sign In</button>
	</div></td></tr>
</table>
</form>
</center>
</body>
</html>
<?php

/*$sql = "UPDATE user SET forget_pwd_link = '2' WHERE emailid='$emailid'";
$conn->query($sql);*/
}
else
{
  echo "<body bgcolor=black><center><font style='font-size:100px; color:rgb(255,0,0); background-color:rgb(0,0,0);' ><b> your Link has been expired</b></font></center></body>";
}
}

?>