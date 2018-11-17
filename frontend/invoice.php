<?php 
session_start();
  require'common/header.php';
require 'dbcon/db_conn.php'; 
$InvoiceId=$_GET['InvoiceId'];
$sql='SELECT concat(user.fname,concat(" ",user.lname))"DonorName", organization_detail_master.name "NGOName", donation_master.description "Description", donation_master.amount "Amount" ,donation_master.created_at "DonatedDate",categories.name "Categorie" FROM `donation_master`
INNER JOIN user ON user.id = donation_master.donor_id
INNER JOIN organization_detail_master ON organization_detail_master.id = donation_master.reciever_id
INNER JOIN categories ON categories.id = donation_master.c_id
WHERE donation_master.id ='.$InvoiceId;
    $result=$conn->query($sql);
if ($result->num_rows > 0) {
    $row=$result->fetch_assoc();
    $donorname=$row['DonorName'];
    $categorie=$row['Categorie'];
    $amount=$row['Amount'];
    $donateddate=$row['DonatedDate'];
    $NGO_Name=$row['NGOName'];
   /* $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();*/
    
}
?>
<br>
<br><br><br>
<html>
</head>
<body>
<table border='0px' style="background-color: rgb(255,255,255); width: 100%;" >
            <tr>
                <td colspan='4'>
                    <table  border="0px" width='100%'>
                        <tr>
                            <td colspan='2'>
                               <h1><img src='img/logo.png' style='width:200px; height: 100px;'></h1>
                            </td>
                            <td align='center'>
                                <h3>Date : <?php echo $donateddate; ?></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3' align='center'>
                                <h3>Invoice Id : <?php echo $InvoiceId; ?></h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td colspan='4'>
                    <table border="0px" width='100%'>
                        <tr>
                            <td colspan='4'>
                               <center><h2>Donation Receipt</h2></center>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr  style='text-align: center; background: rgba(178, 176, 176,.5); width: 100%;' >
                <td width="25%">
                   <h3>Donated From<small>(Donor)</small></h3>
                </td>
                <td width="25%">
                    <h3>Category</h3>
                </td>
                <!-- <td width="25%">
                   <h3>Donated To<small>(NGO)</small></h3>
                </td>
                 -->
                <td width="25%">
                    <h3>Amount</h3>
                </td>
            </tr>
            <tr style='text-align: center; background: rgba(219, 217, 217,.5); width: 100%;'>
                <td width="25%">
                    <?php echo $donorname ; ?>
                </td>
                <td width="25%">
                    <?php echo $categorie ; ?>
                </td>
                <!-- <td width="25%">
                     <?php echo $NGO_Name ; ?>
                </td> -->
                <td width="25%">
                     <?php echo $amount ; ?>
                </td>
            </tr>
            
            <tr>
                <td colspan="4"><center>
                  <br><br> <i><b>This is confirmed payment receipt generated by system</i></b>
                </td></center>
            </tr>
        </table>    
        <!-- <center> -->
    <h3><a href="donation_history.php" style="color: rgb(255,255,255);"><button style="outline: none; background-color: rgb(128, 185, 3); border-color: rgb(128, 185, 3); border:outset; border-radius: 10px"><font style="font-family: Helvetica Neue ; color:rgb(255,255,255);">Go Back</font></button></a></h3>
    <!-- </center> -->
</body>
<?php require'common/footer.php'; 

?>