<?php 
  session_start(); 
  /*if(empty($_SESSION)){
     header("Location: index.php");
  }*/
  require'common/header.php';
require 'dbcon/db_conn.php';
$totalDonation=0;
?>
<br>
<br>
<br>
<br>
<center><p style="background-color: rgb(95, 100, 107); color: rgb(255,255,255); ">For More Info Click On Invoice</p></center>
<table style=" border-radius: 10px; width: 100%;" border="1px">
	<thead>
		<tr style="font-size: 20px; font-style: all; height: 50px; background-color: rgb(224, 213, 100);">
			<th style=" text-align: center;" colspan="2">
				Donor's Name
			</th>
			<th style="text-align: center;">
				Donate Date
			</th>
			<th style="text-align: center;">
				Donated Category
			</th>
			<th style="text-align: center;">
				Description
			</th>
			<th style="text-align: center;">
				Donate Amount
			</th>
			<th style="text-align: center;">
				Invoice
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql='SELECT  user.fname,user.lname, organization_detail_master.name "NgoName",donation_master.created_at "DonateDate",categories.name "Categories",donation_master.description "Description",donation_master.amount "DonateAmount",donation_master.id "InvoiceId"FROM user INNER JOIN  donation_master ON (user.id=donation_master.donor_id) INNER JOIN organization_detail_master ON (donation_master.reciever_id=organization_detail_master.id) INNER JOIN categories ON (donation_master.c_id=categories.id) WHERE organization_detail_master.user_id='.$_SESSION['id'];
			$result=$conn->query($sql);
			/*echo "<pre>";
			print_r($sql);
			die;*/
			if ($result->num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					$donor_name=$row['fname']." ".$row['lname'];
					$DonateDate=$row['DonateDate'];
					$Categories=$row['Categories'];
					$DonateAmount=$row['DonateAmount'];
					$description=$row['Description'];
					$InvoiceId=$row['InvoiceId'];
					
					/*$sql1="SELECT * FROM `organization_detail_master` Where `id` = '".$ngo_id."'";
					$result1=$conn->query($sql1);
					$row1=$result1->fetch_assoc();
					
					$ngo_name=$row1['name'];*/
		?>
		<tr style="background-color: rgb(253, 253, 159);">
			<th style="text-align: center;" colspan="2">
				<?php echo $donor_name; ?>
			</th>
			<!-- <th style="text-align: center;">
				<a style="color: rgb(95, 100, 107);" href="single_event.php?id=<?php /*echo*/ $event_id; ?>" ><?php /*echo*/ $event_name; ?></a>
			</th> -->
			<th style="text-align: center;">
				<?php echo $DonateDate; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $Categories; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $description; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $DonateAmount; $totalDonation = $totalDonation + $DonateAmount; ?>

			</th>
			<th style="text-align: center;">
				<a href="invoice.php?InvoiceId=<?php echo $InvoiceId; ?>">click Here</a>
			</th>
		</tr>
		<?php
				}
			}
		?>
	</tbody>
</table>
<b><p style=" border-radius: 10px; background-color: rgb(224, 213, 100);" align="center">Your Total Donation Amount = <span style="background-color:rgb(19, 198, 19); border-radius: 7px; color: rgb(255,255,255);"><?php echo "&nbsp".$totalDonation."&nbsp"; ?></span></p></b>

		<!-- /SECTION -->
<?php require'common/footer.php'; 

?>