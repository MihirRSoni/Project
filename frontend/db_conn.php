<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectx";
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	
// echo '<pre>';
// print_r($conn);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}