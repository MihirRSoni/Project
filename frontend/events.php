<?php 
  session_start(); 
  /*if(empty($_SESSION)){
     header("Location: index.php");
  }*/
  require'common/header.php';
require 'dbcon/db_conn.php';
?>
<br>
<br>
<br>
<br>
<center><p style="background-color: rgb(95, 100, 107); color: rgb(255,255,255); ">For More Info Click On Event Name</p></center>
<table style=" border-radius: 10px; width: 100%;" border="1px">
	<thead>
		<tr style="font-size: 20px; font-style: all; height: 50px; background-color: rgb(224, 213, 100);">
			<th style=" text-align: center;" colspan="2">
				Ngo
			</th>
			<th style="text-align: center;">
				Ngo's Event Name
			</th>
			<th style="text-align: center;">
				Event Date
			</th>
			<th style="text-align: center;">
				Event Address
			</th>
			<th style="text-align: center;">
				Event Description
			</th>
			<th style="text-align: center;">
				Entry ticket Price(in ₹)
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql="SELECT * FROM `ngo_events`";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					$event_id=$row['event_id'];
					$event_name=$row['event_name'];
					$ngo_id=$row['ngo_id'];
					$event_date=$row['event_date'];
					$event_address=$row['event_address'];
					$description=$row['description'];
					$price=$row['price'];
					
					$sql1="SELECT * FROM `organization_detail_master` Where `id` = '".$ngo_id."'";
					$result1=$conn->query($sql1);
					$row1=$result1->fetch_assoc();
					
					$ngo_name=$row1['name'];
		?>
		<tr style="background-color: rgb(253, 253, 159);">
			<th style="text-align: center;" colspan="2">
				<?php echo $ngo_name; ?>
			</th>
			<th style="text-align: center;">
				<a style="color: rgb(95, 100, 107);" href="single_event.php?id=<?php echo $event_id; ?>" ><?php echo $event_name; ?></a>
			</th>
			<th style="text-align: center;">
				<?php echo $event_date; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $event_address; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $description; ?>
			</th>
			<th style="text-align: center;">
				<?php echo $price; ?>
			</th>
		</tr>
		<?php
				}
			}
		?>
	</tbody>
</table>
		<!-- /SECTION -->
<?php require'common/footer.php'; 

?>