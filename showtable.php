<?php
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 7/31/2015 AD
 * Time: 12:11 AM
 */
session_start();

$table_number = $_GET['number'];
//echo "Table : ".$tablenum."<br>";

$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";

//echo $table_number;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT invoice_id,adult_amount, half_amount , free_amount , table_subtotal , table_open
FROM table_detail WHERE table_status = 'open' and table_number =".$table_number.";";


$result = mysqli_query($conn,$sql);
$resultArray = $result->fetch_assoc();
$table_subtotal = $resultArray['table_subtotal'];
$adult_amount = $resultArray['adult_amount'];
$half_amount = $resultArray['half_amount'];
$free_amount = $resultArray['free_amount'];
$table_open = $resultArray['table_open'];
$invoice_id = $resultArray['invoice_id'];

?>
<html>
<head>
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

    <!-- css file-->

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


    <!-- script file-->

    <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script>


        $(document).ready(function(){

            $("#closebutton").click(function(){

               $("#pos-right-side").load("bill.php?number=<? echo $table_number ?>");
            });
            $("#editbutton").click(function(){
               $("#pos-right-side").load("edittable.php?invoice=<?echo $invoice_id?>");
            });
            $("#joinbutton").click(function(){
               $("#pos-right-side").load("jointable.php?invoice=<?echo $invoice_id?>");
            });


        });
    </script>

</head>

<body style="font-size: 28px;">
<label style="font-size: 26px;">Table : <? echo $table_number ?></label>
<table id="showtable" style="font-size: 26px;">
    <tr>
        <th>ราคารวม : </th>
        <td align="right"><? echo number_format((float)$table_subtotal, 2, '.', '') ?></td>
    </tr>
    <tr>
        <th>Invoice ID : </th>
        <td align="right"><? echo $invoice_id ?></td>
    </tr>
    <tr>
        <th>ผู้ใหญ่ : </th>
        <td align="right"><? echo $adult_amount ?></td>
    </tr>
    <tr>
        <th>เด็ก : </th>
        <td align="right"><? echo $half_amount ?></td>
    </tr>
    
    <tr>
        <th>ฟรี : </th>
        <td align="right"><? echo $free_amount ?></td>
    </tr>

    <tr>
        <th>Open : </th>
        <td align="right"><? echo $table_open ?></td>
    </tr>
</table>
<br>
<div class="container-fluid">
    <? if($_SESSION['user_type'] == "admin")
        echo '<div class="col-sm-4">
        <button class="btn btn-danger" id="closebutton">Close table</button>
    </div>';
    ?>
    <div class = "col-sm-4 col-lg-6">
        <form action="printbill.php?number=<? echo $table_number ?>" method="post">
            <button class="btn btn-success" id="billbutton">Bill</button>
        </form>
    </div>
    <div class="col-sm-4 col-lg-6 btn-group">
        <button class="btn btn-default" id="editbutton">Edit table</button>


        <button class="btn btn-default" id = "joinbutton">Join table</button>
    </div>
</div>
</body>

</html>