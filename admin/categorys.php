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
        Categorys's Table
        <small>preview of Categorys'S Data</small>
      </h1>
      <div class="btn-group">
                  <button type="button" onclick="location.href='addcat.php?id=0'" class="btn btn-info">Add Category</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="addcat.php?id=1">Food</a></li>
                    <li><a href="addcat.php?id=2">Clothes</a></li>
                    <li><a href="addcat.php?id=3">Money</a></li>
                    <li><a href="addcat.php?id=4">Social Services</a></li>
                    <li><a href="addcat.php?id=5">Cloth</a></li>
                    <li><a href="addcat.php?id=6">Cloth</a></li>
                    <li class="divider"></li>
                    <li><a href="addcat.php?id=7">Other</a></li>
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
              <h3 class="box-title">Categorys's Table</h3>

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
                  <th><center>Name</center></th>
                  <th><center>Image</center></th>
                  <th><center>Description</center></th>
                  <th><center>Status</center></th>
                  <th><center>Edit/Delete Row?</center></th>
                </tr>
                <?php
                  $sql="SELECT * FROM `categories`";
                  $result=$conn->query($sql);
                  /*echo "<pre>";
                  print_r($result);die;*/
                  if($result->num_rows > 0){
                    while ($row=$result->fetch_assoc()) {
                      ?><tr>
                        <td><center><?php echo $row['name']; ?></center></td>
                        <td><center><?php echo $row['image']; ?></center></td>
                        <td><center><?php echo $row['description']; ?></center></td>
                        <td><center><?php echo $row['status']; ?></center></td>
                        <td><center>
                          <a href="editcat.php?id=<?php echo $row["id"]; ?>"
                          onclick="return confirm('You Want To Edit Row?')">Edit</a>/
                          <a href="deletecat.php?id=<?php echo $row["id"]; ?>"
                          onclick="return confirm('Are you sure you Want to delete row')">Delete</a></center>
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