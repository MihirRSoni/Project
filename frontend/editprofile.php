<?php 

$fname="";
$lname="";
$emailid="";
$cn="";
session_start();
/*echo "<pre>";
print_r($_SESSION);
die;*/
if(!empty($_SESSION))
{
	// header("location: validation.php")
	require'dbcon/db_conn.php';
    $sql = "SELECT * FROM user WHERE emailid ='".$_SESSION['emailid']."'";
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
        // $cpwd=$_POST['cpassword'];
	}
  	/*echo "<pre>";
  	print_r($row);
  	die;*/
     	  		
      
	//UPDATE `user` SET `id`=[value-1],`fname`=[value-2],`lname`=[value-3],`emailid`=[value-4],`password`=[value-5],`role`=[value-6],`status`=[value-7],`created`=[value-8],`updated`=[value-9] WHERE 1
    // $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`emailid`='$emailid',`password`='$password',`role`='$role',`status`='$status',`updated`='$ct' WHERE `id` = ".$_SESSION['id']."";
}else{
	header("location: login.php");	
}
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <title>Log in</title>
  <!- Tell the browser to be responsive to screen width -->
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
<?php
//session_start();
require'common/header.php'; 
?>
 <?php
 $validerror="";
 $updated="";
 $Updateerror="";
 $sql="";
 
      //if(){}
date_default_timezone_set("Asia/Kolkata");
$t=time();
$ct=date("d-M-Y D h:i:sa e P",$t);

if(!empty($_POST))
{
	$fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $emailid=$_POST['emailid'];
    
    if($fname=="" || $lname=="" || $emailid=="")
    {
    	$validerror = " Compulsory to enter all the fields with *  ";
    }
    else
    {
      $_SESSION['emailid']=$_POST['emailid'];
    	if(!empty($_POST['cn'])){
    		$cn=$_POST['cn'];
        
    		$sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`emailid`='$emailid',`cno`='$cn',`role`='$role',`status`='$status',`updated`='$ct' WHERE `id` = ".$_SESSION['id']."";
    	}else{
        
    		$sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`emailid`='$emailid',`role`='$role',`status`='$status',`updated`='$ct' WHERE `id` = ".$_SESSION['id']."";
    	}
    	$result = $conn->query($sql);
    	if($result=== TRUE){
            $sql = "SELECT * FROM user WHERE emailid ='".$_SESSION['emailid']."'";
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
                $_SESSION['id']=$row["id"];
                $name= $row["fname"]." ".$row["lname"];
                $_SESSION['name']=$name;
                $_SESSION['emailid']=$row["emailid"];
                //$emailid=$row['emailid'];
                $cn=$row['cno'];
                $role=$row['role'];//1=donor...2=NGO...3=admin
                  $status=$row['status'];//1=active...0=deactive  
                  // $cpwd=$_POST['cpassword'];
            }  
            $_SESSION['id']=$row["id"];
            $name= $row["fname"]." ".$row["lname"];
            $_SESSION['name']=$name;
            $_SESSION['emailid']=$row["emailid"];
          	$updated=" Profile Update Succeessfuly ";
    	}
    	else{
    		$Updateerror="";
    	}
    	
    }
}
?>
<b>
              <div class="login-box">
 
  <!-- /.login-logo -->
               	<div class="login-box-body">
               			<?php 
                            if(!empty($_POST))
                            {
                              echo "<font style='background-color: rgb(255,0,0);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);''>".$validerror.$Updateerror."</font>";
                              echo "<font style='background-color: rgb(50,255,80);font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,255,255);''>".$updated."</font>";

                            }
                            else
                            {
                              echo $validerror = "";
                            }
                            ?>
						<form action="" method="post">
                              <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>
                                   <font style=" font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">First Name :</font>
                                   <div class="form-group has-feedback">
                                          <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" placeholder="Enter First Name">
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                   </div>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Last Name :</font>
                                   <div class="form-group has-feedback">
                                          <input type="value" name="lname" class="form-control" value="<?php echo $lname; ?>" placeholder="Enter Last Name">
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                   </div>

                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(255,0,0);">
                                    *</font>     
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Email Id :</font>
                                   
                                   <div class="form-group has-feedback">
                                          <input type="email" name="emailid" class="form-control" value="<?php echo $emailid; ?>" placeholder="Email" readonly >
                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                   </div>
                                   <font style="font-family: initial; font-style: italic;font-size: 15px; color: rgb(0,0,0);">Contact Number :</font>
                                   
                                   <div class="form-group has-feedback">
                                          <input type="Number" name="cn" class="form-control" value="<?php echo $cn; ?>" placeholder="Caontact Number (+009999999999)">
                                          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
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
                                                 <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                          </div>
        <!-- /.col -->
                                   </div>
                            </form>
                           
                        </div>
                    </div>
</b>
</body>
</html>
