<?php 
session_start();
//print_r($_SESSION); die;
if(!empty($_SESSION['adminemailid']))
{ 

require('dbcon/db_conn.php');
$user_id = $_GET['user'];
$sql = "SELECT * FROM user WHERE id= ".$user_id;
$result = $conn->query($sql);
if ($result->num_rows >0)
{
  $row = $result->fetch_assoc();
 // echo '<pre>'; print_r($row); die;
  $fname = $row['fname'];
  $lname=$row['lname'];
  $email = $row['emailid'];
  $password = $row['password'];
  $role = $row['role'];
  $status = $row['status'];
}
require('common/header.php');
require('common/sidebar.php');
?>

  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Category
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
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $fname; ?>" name="fname" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $lname; ?>" name="lname" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="emailid" placeholder="Enter email" readonly>
                </div>
                
              
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="pwd" value="<?php echo $password; ?>" name="pwd" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <input type="text" class="form-control" name="role" value="<?php echo $role; ?>" placeholder="user's Role 1.Donor 2.NGO 3.Admin ">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" class="form-control" name="status" value="<?php echo $status; ?>" placeholder="user's Status 1/0 active/disable">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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

  if(!empty($_POST))
  {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $emailid = $_POST['emailid'];
    $password = $_POST['pwd'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $sql = "UPDATE user SET fname='$fname',lname='$lname', emailid='$emailid',password='$password', status='$status' WHERE id=$user_id";
    //print_r($sql);die;
    if ($conn->query($sql) === TRUE) 
    {
      // header("Location: user.php");
      ?>
      <meta http-equiv="refresh" content="2;url=user.php" />
      <?php
    } 
    else 
    {
      echo "Error updating record:" . $conn->error;
    }
  }
  ?>
