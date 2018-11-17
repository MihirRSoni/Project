<?php
//Insert..
$sql = "INSERT INTO `demod`( `name`, `email`, `password`, `status`) VALUES ('$name' , '$email' , '$password' , '$status')";
if ($conn->query($sql) === TRUE) 
	{
    	echo "New record created successfully";
	} 
	else 
	{
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
//select...

$sql = "SELECT * FROM user WHERE emailid = '$email' AND password = '$password'";

$result = $conn->query($sql);
  // echo '<pre>';
  // print_r($result);
  if ($result->num_rows > 0) 
  {
      //echo '<pre>';
      //print_r($result->fetch_assoc()); die;
      // output data of each row
      $row = $result->fetch_assoc();
      $name = $row["fname"]." ".$row["lname"];
      $id=$row["email"];
      $rid=$row["role"];
      $status=$row["status"];

      if($status==0){
        $isStatusError=1;
      }
      
  }else{
       $isIdError=1;
  }
 //alter table
  ALTER TABLE `user` ADD `emailid` TEXT NOT NULL AFTER `updated`;
?>