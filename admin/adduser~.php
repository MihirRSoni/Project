<?php 
    session_start();
    $sql="";
    $sql2="";
    if(!empty($_SESSION['adminemailid'])){
        require'common/header.php';
        require'common/sidebar.php';
        require'dbcon/db_conn.php';
        $grole=$_GET['role'];
        if(!empty($_POST))
        {
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $name = $fname." ".$lname;
           $emailid = $_POST['emailid'];
           $password = $_POST['pwd'];
           $status = $_POST['status'];
           $role = $_POST['role'];
           if($role==1){
             $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`, `status`) VALUES ('$fname','$lname','$emailid','$password','$status')";  
           }
           elseif ($role==2) {
            $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`, `status`) VALUES ('$fname','$lname','$emailid','$password','$status')";  
            }
            elseif ($role==3) {
              $sql = "INSERT INTO `user`(`fname`,`lname`, `emailid`, `password`, `status`) VALUES ('$fname','$lname','$emailid','$password','$status')";  
            }

            if ($conn->query($sql) === TRUE) 
             {
                if($role==2){
                  $sql="SELECT * FROM `user` WHERE `emailid` = ".$emailid."";
                  $result=$conn->query($sql);
                  if($row=$result->fetch_assoc())
                  {
                    $user_id=$row['id'];
                    $sql2= "INSERT INTO `organization_detail_master`(`name`, `address`, `cover_image`, `created_at`, `updated_at`) VALUES ($name','$emailid','$password','$status')";  
                      if ($conn->query($sql2) === TRUE) 
                      {
                    
                      } 
                      else 
                      {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                      }
                }
                header("Location: users.php");
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
        if($grole==1){
          echo"Add Donor :";
        }elseif ($grole==2) {
          echo"Add NGO :";
        }elseif ($grole==3) {
          echo"Add New Admin Id :";
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
        if($grole==1){
          echo"Add Donor :";
        }elseif ($grole==2) {
          echo"Add NGO :";
        }elseif ($grole==3) {
          echo"Add New Admin Id :";
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