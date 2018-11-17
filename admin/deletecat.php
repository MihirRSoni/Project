<?php
require('dbcon/db_conn.php');
//print_r ($_GET);
$user_id = $_GET['id'];
$sql="DELETE FROM `categories` Where id = $user_id";

if($conn->query($sql) === TRUE)
{
	header("Location: categorys.php");

}
else
{
	echo "Error Deleting Record: ". $conn->error;
}
?>