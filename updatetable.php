<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 9/3/2015
 * Time: 12:45 AM
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
$adult_amount = $_POST['adultamount'];
$half_amount = $_POST['halfamount'];
$free_amount = $_POST['freeamount'];

echo $adult_amount;
echo $half_amount;
echo $free_amount;
$adult_price = $adult_amount*299;
$half_price = $half_amount*150;
$free_price = $free_amount*0;
$table_subtotal = $adult_price+$half_price;
echo $table_subtotal;

$sql = "UPDATE table_detail SET adult_amount = ".$adult_amount." , half_amount = ".$half_amount." , free_amount =".$free_amount." , table_subtotal = ".$table_subtotal." WHERE invoice_id = '".$invoice_id."';";

$query = mysqli_query($conn,$sql);

//$result = $query->fetch_assoc();

echo $conn->error;
//include("printbill.php?number=".)

$sql = "SELECT invoice_id ,table_number , adult_amount , half_amount , free_amount , table_open , table_close , table_subtotal FROM table_detail WHERE invoice_id = '".$invoice_id."';";

$query = mysqli_query($conn,$sql);

$result = $query->fetch_assoc();

echo mysqli_error($conn);
$table_number = $result['table_number'];
$table_invoice = $result['invoice_id'];
$adult_amount = $result['adult_amount'];
$half_amount = $result['half_amount'];
$free_amount = $result['free_amount'];
$table_open = $result['table_open'];
$table_close = date("H:i:s");
$table_subtotal = $result['table_subtotal'];
$adult_price = $adult_amount*299;
$half_price = $half_amount*150;

$connector3 = new WindowsPrintConnector("zebra3");
$printer3 = new Escpos($connector3);
$img = new EscposImage("logo1.jpg");
$printer3->graphics($img);
$printer3->feed(1);
//$printer->text("                 ชาบูนางใน                \n");
$printer3->text("------------------------------------------\n");
$printer3->text("                  โต๊ะ : ".$table_number."\n");
$printer3->text("        เลขที่ใบเสร็จ  :  ".$table_invoice."\n");
$printer3->text("             วันที่ :  ".date('d/m/y')."\n");
$printer3->text("             เวลา : ".$table_open."\n");
//$printer3->text("          พนักงาน : ".$user_name."\n");   !! need user name
$printer3->feed(1);
$printer3->text("------------------------------------------\n");
$printer3->text("                    บุฟเฟต์\n");
$printer3->feed(1);
if($adult_amount != "0")
    $printer3->text("    ".$adult_amount."    ผู้ใหญ่ 299                  ".number_format((float)$adult_price, 2, '.', '')."\n");
if($half_amount != "0")
    if($adult_amount >= 4)
        $printer3->text("    ".$half_amount."    เด็ก 150                    ".number_format((float)$half_price, 2, '.', '')."\n");
    else
        $printer3->text("    ".$half_amount."    เด็ก 150                   ".number_format((float)$half_price, 2, '.', '')."\n");
if($free_amount != "0")
    $printer3->text("    ".$free_amount."    ฟรี                       \n");

$printer3->feed(2);
//$printer3->text("      รวม                         ".number_format((float)$table_subtotal, 2, '.', '')."\n");
//$printer3->feed(1);
$printer3->text("------------------------------------------\n");
$printer3->feed(1);
$printer3->cut();

$printer3->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>