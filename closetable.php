<?php
    $table_number = $_GET["number"];


date_default_timezone_set("Asia/Bangkok");
$table_close = date("H:i:s");
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 8/2/2015 AD
 * Time: 1:02 PM
 */

$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT invoice_id ,joined from table_detail WHERE table_number = '".$table_number."' AND table_status = 'open' ;";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$table_invoice = $row['invoice_id'];
$joined = $row['joined'];
echo $table_invoice;
$sql = "UPDATE table_detail SET table_status = 'close' , table_close = '".$table_close."' WHERE invoice_id = '".$table_invoice."';";
$result = mysqli_query($conn,$sql);


if(joined != '0'){
    //echo $joined;
    $sql = "UPDATE table_table SET table_status = 'available' WHERE table_number = ".$joined;
    $result = mysqli_query($conn,$sql);
}
if($table_number != 999) {
    $sql = "UPDATE table_table SET table_status = 'available' WHERE table_number = '" . $table_number . "'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

else{
        $sql = "UPDATE table_table SET table_status='office' WHERE table_number=".$table_number;
        $result = mysqli_query($conn,$sql);
    }

$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>
