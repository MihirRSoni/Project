<?php 
//require'common/header.php';
require 'dbcon/db_conn.php';
$amount=0;
$Tamount=0;
$userId= array();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table style=" border-radius: 10px; width: 100%;" border="1px">
	<thead>
		<tr style="font-size: 20px; font-style: all; height: 50px; background-color: rgb(224, 213, 100);">
			<th style=" text-align: center;">
				NGO's id
			</th>
			
			<th style="text-align: center;">
				Donate Total Amount
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql='SELECT `reciever_id`, SUM(`amount`)"Amount" FROM `donation_master` GROUP BY 1';
			$result=$conn->query($sql);
			
			if ($result->num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					/*echo "<pre>";
					print_r($row);*/
					// $ngoId=$row['reciever_id'];
					// $amount=$row['amount'];
		?>
		<tr style="background-color: rgb(253, 253, 159);">
			
			<th style="text-align: center;">

				<?php 
				echo $row['reciever_id'];
				 ?>
			</th>
			<th style="text-align: center;">
				
				<?php 
				echo $row['Amount'];
				 
				}
				?>
			</th>
			
			
		</tr>
		<?php
				}
		?>
	</tbody>
</table>
</body>
</html>