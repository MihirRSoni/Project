<?php 
       session_start();
       if(!empty($_SESSION['adminemailid'])){

       require'common/header.php';
       require'common/sidebar.php';
       require'dbcon/db_conn.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User's Table
        <small>preview of User'S Data</small>
      </h1>
      <div class="btn-group">
                  <button type="button" onclick="location.href='adduser.php'" class="btn btn-info">Add User</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="adduser.php?role=1">Add Donor</a></li>
                    <li><a href="adduser.php?role=2">Add Ngo</a></li>
                    <li class="divider"></li>
                    <li><a href="adduser.php?role=3">Add Admin</a></li>
                  </ul>
                </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User's Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th><center>ID</center></th>
                  <th><center>User</center></th>
                  <th><center>Email</center></th>
                  <th><center>Password</center></th>
                  <th><center>Status</center></th>
                  <!-- <th><center>Role</center></th> -->
                </tr>
                <?php
                  $sql="SELECT * FROM user";
                  $result=$conn->query($sql);
                  /*echo "<pre>";
                  print_r($result);die;*/
                  if($result->num_rows > 0){
                    while ($row=$result->fetch_assoc()) {
                      ?><tr>
                        <td><center><?php echo $row['id']; ?></center></td>
                        <td><center><?php echo $row['fname']." ".$row['lname']; ?></center></td>
                        <td><center><?php echo $row['emailid']; ?></center></td>
                        <td><center><?php echo $row['password']; ?></center></td>
                        <td><center><?php echo $row['status']; ?></center></td>
                        <!-- <td><center><?php /*echo*/ $row/*['role']*/; ?></center></td> -->
                        <td>
                          <a href="edituser.php?user=<?php echo $row["id"]; ?>"
                          onclick="return confirm('You Want To Edit Row?')">Edit</a>/
                          <a href="deleteuser.php?user=<?php echo $row["id"]; ?>"
                          onclick="return confirm('Are you sure you Want to delete row')">Delete</a>
                        </td> 
                      </tr>
                        <?php
                    }
                  }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require'common/footer.php'; 
}
else{
       header('location: login.php');
}
?>