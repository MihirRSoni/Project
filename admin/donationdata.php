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
        Donation Data's Table
        <small>preview of Donation'S Data</small>
      </h1>
      <div class="btn-group">
                  
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
              <h3 class="box-title">Donation's Table</h3>

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
                  <th><center>Donor Name</center></th>
                  <th><center>Donation Category</center></th>
                  <th><center>Donation Amount</center></th>
                  <th><center>NGO Name</center></th>
                  <th><center>Description</center></th>
                  <th><center>Donated Date</center></th>
                  <th><center>View Detail</center></th>
                </tr>
                <?php
                  $sql='SELECT donation_master.id"donationId",concat(user.fname,concat(" ",user.lname))"DonorName", organization_detail_master.name "NGOName", donation_master.description "Description", donation_master.amount "Amount" ,donation_master.created_at "DonatedDate",categories.name "Categorie" FROM `donation_master` INNER JOIN user ON (user.id = donation_master.donor_id) INNER JOIN organization_detail_master ON (organization_detail_master.id = donation_master.reciever_id) INNER JOIN categories ON (categories.id = donation_master.c_id)';
                  $result=$conn->query($sql);
                  /*echo "<pre>";
                  print_r($result);die;*/
                  if($result->num_rows > 0){
                    while ($row=$result->fetch_assoc()) {
                      ?><tr>
                        <td><center><?php echo $row['DonorName']; ?></center></td>
                        <td><center><?php echo $row['Categorie']; ?></center></td>
                        <td><center><?php echo $row['Amount']; ?></center></td>
                        <td><center><?php echo $row['NGOName']; ?></center></td>
                        <td><center><?php echo $row['Description']; ?></center></td>
                        <td><center><?php echo $row['DonatedDate']; ?></center></td>

                        <!-- <td><center><?php //if($row['status']==1){echo "Active"; } else{ echo "Inactive";} ?></center></td> -->
                        <td><center>
                          <a href="donatedataview.php?id=<?php echo $row["donationId"]; ?>"
                          onclick="return confirm('Are You Sure ?')">View</a></center>
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