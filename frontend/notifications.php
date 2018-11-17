<?php
session_start(); 
  if(empty($_SESSION)){
     header("Location: index.php");
  }
  require'common/header.php';
require 'dbcon/db_conn.php'; 
  ?>
<!DOCTYPE html>
<html lang="en">

	<!-- SECTION -->
	<!-- /SECTION -->

	<!-- FOOTER -->
<?php require'common/footer.php'; 

?>