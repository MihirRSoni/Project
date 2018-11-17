<?php 
session_start();
//print_r($_SESSION); die;
if(!empty($_SESSION['adminemailid']))
{ 

require('dbcon/db_conn.php');
$cat_id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id= ".$cat_id;
$result = $conn->query($sql);
if ($result->num_rows >0)
{
  $row = $result->fetch_assoc();
 // echo '<pre>'; print_r($row); die;
  $name=$row['name'];
  $description=$row['description'];
  $status=$row['status'];
  $added_by=$row['added_by'];
  //$created_at=$row['created_at'];
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
        Edit user
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
              <h3 class="box-title">Edit user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description" value="<?php echo $description; ?>" placeholder="Catagory description">
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
    date_default_timezone_set("Asia/Kolkata");
    $t=time();
    $updated_at=date("d-M-Y D h:i:sa e P",$t);
    $name=$_POST['name'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    $status = $_POST['status'];

    $sql = "UPDATE categories SET name='$name',description='$description', status='$status',updated_at='$updated_at' WHERE id=$cat_id";
    //print_r($sql);die;
    if ($conn->query($sql) === TRUE) 
    {
      // header("Location: categorys.php");
      ?>
      <meta http-equiv="refresh" content="2;url=categorys.php" />
      <?php
    } 
    else 
    {
      echo "Error updating record:" . $conn->error;
    }
  }
?>