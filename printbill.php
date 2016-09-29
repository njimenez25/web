<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 8/25/2015
 * Time: 6:18 AM
 */
require_once(dirname(__FILE__)."/escpos/Escpos.php");
date_default_timezone_set("Asia/Bangkok");
$table_number = $_GET['number'];
$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "SELECT invoice_id , adult_amount , half_amount , free_amount , table_open , table_close , table_subtotal FROM table_detail WHERE table_status = 'open' AND table_number = ".$table_number;

$query = mysqli_query($conn,$sql);

$result = $query->fetch_assoc();

echo mysqli_error($conn);
$table_invoice = $result['invoice_id'];
$adult_amount = $result['adult_amount'];
$half_amount = $result['half_amount'];
$free_amount = $result['free_amount'];
$table_open = $result['table_open'];
$table_close = date("H:i:s");
$table_subtotal = $result['table_subtotal'];
$adult_price = $adult_amount*299;
$half_price = $half_amount*150;


$sql = "SELECT beer1 , beer2 , beer3 FROM beer_table WHERE invoice_id = '".$table_invoice."'";
$query = mysqli_query($conn,$sql);

$re = $query->fetch_assoc();
echo mysqli_error($conn);
$beer1 = $re['beer1'];
$beer2 = $re['beer2'];
$beer3 = $re['beer3'];
echo $beer1;
echo $beer2;

$beeramount = $beer1 + ($beer2*4);
echo $beeramount;
$beerpro = floor($beeramount/4);
$beerleft = $beeramount%4;

$beerprice = ($beerpro*250) + ($beerleft*70) + ($beer3*15);
echo "pro".$beerpro;
echo "price".$beerprice;
echo "left".$beerleft;
echo "soda".$beer3;


$sql = "UPDATE table_detail SET drink_price = ".$beerprice." WHERE invoice_id = '".$table_invoice."'";
$result = mysqli_query($conn,$sql);

$table_subtotal += $beerprice;
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
    $printer3->text("    ".$adult_amount."    ผู้ใหญ่ 299                 ".number_format((float)$adult_price, 2, '.', '')."\n");
if($half_amount != "0")
    if($adult_amount >= 4)
        $printer3->text("    ".$half_amount."    เด็ก 150                   ".number_format((float)$half_price, 2, '.', '')."\n");
    else
        $printer3->text("    ".$half_amount."    เด็ก 150                  ".number_format((float)$half_price, 2, '.', '')."\n");
if($free_amount != "0")
    $printer3->text("    ".$free_amount."    ฟรี                       \n");
if($beerleft != 0){
    $printer3->text("    ".$beerleft."    เบียร์สิงห์ 70               ".number_format((float)$beerleft*70,2,'.','')."\n");
}
if($beerpro != 0){
    $printer3->text("    ".$beerpro."    โปรเบียร์สิงห์ 250           ".number_format((float)$beerpro*250,2,'.','')."\n");
}
if($beer3 != 0){
    $printer3->text("    ".$beer3."    โซดาสิงห์ 15               ".number_format((float)$beer3*15,2,'.','')."\n");
}
$printer3->feed(2);
$printer3->text("      รวม                         ".number_format((float)$table_subtotal, 2, '.', '')."\n");
$printer3->feed(1);
$printer3->text("------------------------------------------\n");
$printer3->feed(1);
$printer3->cut();

$printer3->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>