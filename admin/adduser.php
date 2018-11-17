<?php 
    session_start();
    	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;      
	require'assets/vendor/autoload.php';
    $sql="";
    $sql2="";
    $address="";
    $grole="";
    if(!empty($_GET['role']))
    {
      $grole=$_GET['role'];
    }
    if(!empty($_SESSION['adminemailid'])){
        require'common/header.php';
        require'common/sidebar.php';
        require'dbcon/db_conn.php';
      
        if(!empty($_POST))
        {
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $name = $fname." ".$lname;
           $emailid = $_POST['emailid'];
           $password = $_POST['pwd'];
           if(!empty($_POST['$address']))
           {
                $address=$_POST['address'];
           }
           $status = $_POST['status'];
           $role = $_POST['role'];
           date_default_timezone_set("Asia/Kolkata");
	   $t=time();

	   $ct=date("d-M-Y D h:i:sa e P",$t);
           $created = $ct;
           $updated =$ct;
           if($role==1){
             $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`,`role`, `status`,`created`,`updated`) VALUES ('$fname','$lname','$emailid','$password','$role','$status','$created','$updated')";  
           }
           elseif ($role==2) {
            $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`, `role`, `status`,`created`,`updated`) VALUES ('$fname','$lname','$emailid','$password','$role','$status','$created','$updated')";  
            // $sql1="INSERT INTO `organization_detail_master`(`user_id`, `name`, `address`, `cover_image`, `created_at`, `updated_at`) VALUES ()";
            }
            elseif ($role==3) {
              $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`, `role`, `status`,`created`,`updated`) VALUES ('$fname','$lname','$emailid','$password','$role','$status','$created','$updated')";  
            }

            if ($conn->query($sql) === TRUE) 
             {
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
	        	$mail->Subject = 'Welcome to sing up on our site';
	        	// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	        	$query="Hello $name, Welcome to our site";
	        	$mail->Body    = $query;
	        	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	        	$mail->send();
	        	echo 'Message has been sent';
	        	// header("Location: login.php");
	        	if($role==2)
	        	{
	        		$last_id = $conn->insert_id;
	        		$sql1="INSERT INTO `organization_detail_master`(`user_id`, `name`, `address`, `created_at`, `updated_at`) VALUES ('$last_id','$name','$address','$ct','$ct')";
	        		$conn->query($sql1);
	        	}
	        	?>
      			<meta http-equiv="refresh" content="2;url=user.php" />
      			<?php
	        } 
	        catch (Exception $e) {
	            $mailerror="Email Id Is Invalid!" ; 
	        }
                                   /*echo "New record created successfully";
                                   header("location: login.php");*/
                /*if($role==2){
                  /*$sql="SELECT * FROM `user` WHERE `emailid` = ".$emailid."";
                  $result=$conn->query($sql);
                  if($row=$result->fetch_assoc())
                  {
                    $user_id=$row['id'];*/
                   /* $last_id = $conn->insert_id;

                    $sql2= "INSERT INTO `organization_detail_master`(`user_id`, `name`, `address`, `cover_image`, `created_at`, `updated_at`) VALUES ('$last_id',$name','$lname','$password','$status')";  
                      if ($conn->query($sql2) === TRUE) 
                      {
                        header("Location: users.php");
                      } 
                      else 
                      {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                      }
                }*/
                //$sql="INSERT INTO `notification` (`u_id`, `title`, `status`) VALUES ('".$_SESSION["adminid"]."',)";
                // header("Location: users.php");
                ?>
      			<meta http-equiv="refresh" content="2;url=user.php" />
      		<?php
            } 
            else 
            {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        // $conn->close();
        }
?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php
        if(!empty($_GET['role'])){
            if($grole==1){
              echo"Add Donor :";
            }elseif ($grole==2) {
              echo"Add NGO :";
            }elseif ($grole==3) {
              echo"Add New Admin Id :";
            }
          }
        else{
          echo "Add User :";
        }

        ?>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php
        if(!empty($_GET['role'])){
            if($grole==1){
              echo"Add Donor :";
            }elseif ($grole==2) {
              echo"Add NGO :";
            }elseif ($grole==3) {
              echo"Add New Admin Id :";
            }
          }
        else{
          echo "Add User :";
        }

        ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter First name or NGO name">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lname" placeholder="Enter Last name or area name of Ngo">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="emailid"
                  placeholder="Enter email">
                </div>
                
              
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="pwd" placeholder="Enter Password">
                </div>
                
                <div class="form-group">
                  <label>Role</label>
                  <input type="text" class="form-control" name="role" value="<?php if(!empty($grole)){ echo $grole; } ?>" placeholder="user's Role 1.Donor 2.NGO 3.Admin ">
                </div>
                <?php if($grole==2)
                	 { 
                ?>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address"
                  placeholder="Not Mandetery">
                </div>
        	<?php 
        		}
        	?>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" class="form-control" name="status" placeholder="user's Status 1/0 active/disable">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
        require('common/footer.php');
    }
    else
    {
        header("Location: login.php");
    }
?>