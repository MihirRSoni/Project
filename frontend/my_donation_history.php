<?php

  session_start(); 
  if(empty($_SESSION)){
     header("Location: index.php");
  }
  $totalDonation=0;
  require'common/header.php';
require 'dbcon/db_conn.php'; 
?>
		
		<!-- /HOME OWL -->
	
	<!-- /HEADER -->

	

	

	<!-- CAUSESS -->
	<div id="causes" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<br>
				<div class="container" align="center">
				  <h2>My Donation History</h2>
				  <p>Here it will list all your past donation history</p>            
				  <table class="table table-condensed">
				    <thead>
				      <tr>
				        <th>Category</th>
				        <th>Amount</th>
				        <th>Description</th>
				        <th>NGO</th>
				        <th>Date</th>				        
				      </tr>
				    </thead>
				    <tbody>
				    <?php
				    $donor_id = $_SESSION['id'];
					$sql1 = 'SELECT  organization_detail_master.name "NgoName",donation_master.created_at "DonateDate",categories.name "Categories",donation_master.description "Description",donation_master.amount "Amount",donation_master.id "InvoiceId"FROM user INNER JOIN  donation_master ON (user.id=donation_master.donor_id) INNER JOIN organization_detail_master ON (donation_master.reciever_id=organization_detail_master.id) INNER JOIN categories ON (donation_master.c_id=categories.id) WHERE user.id='.$donor_id;
					//echo $sql1; die;
					$result = $conn->query($sql1);
					while($row = $result->fetch_assoc())
					{
					?>
					<tr>
						<td><?php echo $row['Categories'];?></td>
						<td><?php echo $row['Amount']; $totalDonation=$totalDonation + $row['Amount']; ?></td>
						<td><?php echo $row['Description']; ?></td>
						<td><?php echo $row['NgoName'];?></td>
						<td><?php echo $row['DonateDate'];?></td>
					</tr>
					<?php
					}
					?>
				    </tbody>
				  </table>
				  <p>This will show latest records of users donation donated based on category<br><p style="/*border-color: rgb(248, 255, 150);*/ border-radius: 10px; background-color: rgb(249, 201, 252);">Your Total Donated Amount = <?php echo $totalDonation ?></p></p>
				</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->

	

	<!-- FOOTER -->
<?php require'common/footer.php'; 

?>