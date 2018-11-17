<?php
require('dbcon/db_conn.php');
//print_r ($_GET);
$user_id = $_GET['user'];
$sql="DELETE FROM user Where id = $user_id";

if($conn->query($sql) === TRUE)
{
	header("Location: user.php");

}
else
{
	echo "Error Deleting Record: ". $conn->error;
}
?>