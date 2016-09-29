<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 9/3/2015
 * Time: 1:57 AM
 */

$invoice_id = $_GET['invoice'];


date_default_timezone_set("Asia/Bangkok");
require_once(dirname(__FILE__)."/escpos/Escpos.php");

$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$joinnum = $_POST['joinnum'];
$sql = "UPDATE table_detail SET joined = ".$joinnum." WHERE invoice_id = '".$invoice_id."';";

$query = mysqli_query($conn,$sql);

$sql = "UPDATE table_table SET table_status='not-available' WHERE table_number=".$joinnum;
$result = mysqli_query($conn,$sql);

$conn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>