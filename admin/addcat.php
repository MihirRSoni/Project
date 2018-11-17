<?php 
    session_start();
    if(!empty($_SESSION['adminemailid'])){
        require'common/header.php';
        require'common/sidebar.php';
        require'dbcon/db_conn.php';

        if(!empty($_POST))
        {
          $name = $_POST['name'];
          $description = $_POST['description'];
          $status = $_POST['status'];
          $added_by = $_SESSION['adminid'];
          date_default_timezone_set("Asia/Kolkata");
          $t=time();
          $created_at=date("d-M-Y D h:i:sa e P",$t);
          $updated_at=$created_at;
          $sql = "INSERT INTO `categories`(`name`,`description`,`status`,`added_by`,`created_at`,`updated_at`) VALUES ('$name','$description','$status','$added_by','$created_at','updated_at')";

             if ($conn->query($sql) === TRUE) 
             {
                 header("Location: categorys.php");
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
       Add Category
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
              <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
                </div>
                
                <div class="form-group">
                  <label>Image</label>
                  <input type="File" class="form-control" name="pic"  placeholder="Browse Image File">
                </div>
                <div class="form-group">
                  <label>description</label>
                  <input type="text" class="form-control" name="description" placeholder="Enter description">
                </div>
                <div class="form-group">
                  <label>status</label>
                  <input type="text" class="form-control" name="status" placeholder="Enter status">
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