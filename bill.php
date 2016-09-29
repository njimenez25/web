<?php
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 8/22/15
 * Time: 1:44 PM
 */

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

$sql = 'SELECT invoice_id FROM table_detail WHERE table_status = "open" AND table_number = '
    .$table_number;

$query = mysqli_query($conn,$sql);

$result = $query->fetch_assoc();

$table_invoice = $result['invoice_id'];

$sql = "SELECT adult_amount, half_amount , free_amount , table_subtotal , table_open
FROM table_detail WHERE table_status = 'open' and invoice_id = '".$table_invoice."';";


$result = mysqli_query($conn,$sql);
$resultArray = $result->fetch_assoc();
$table_subtotal = $resultArray['table_subtotal'];
$adult_amount = $resultArray['adult_amount'];
$half_amount = $resultArray['half_amount'];
$free_amount = $resultArray['free_amount'];

?>

<html>
<head>
    <script>
        $(document).ready(function(){
            $("#cal").click(function(){
                var money = $("#money").val();
                var subtotal = <? echo $table_subtotal; ?>;
                //alert(subtotal);
                var change = money - subtotal;
               //$("#change").text(change);.
                confirm("Change is : " + change + "baht.");



            });
        });

    </script>
</head>
<body>
<label>Table : <? echo $table_number ?></label><br>
<label>Invoice : <? echo $table_invoice ?></label><br>
<label>Subtotal : <? echo number_format((float)$table_subtotal, 2, '.', '') ?></label>

<form action="closetable.php?number=<? echo $table_number ?>" method="post">
    <input id="money" placeholder="money">
    <button id="cal" type="submit">Calculate</button>
    <label id="change"></label>
</form>




</body>

</html>


