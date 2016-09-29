<?php

session_start();
//echo $_SESSION['user_name'];
date_default_timezone_set("Asia/Bangkok");
$table_close = date("H:i:s");

require_once(dirname(__FILE__)."/escpos/Escpos.php");
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 8/2/2015 AD
 * Time: 1:02 PM
 */

try{
	$connector = new WindowsPrintConnector("zebra");
	$printer = new Escpos($connector);
	$printer->text("ทดสอบภาษาไทย");
	$printer->feed(1);
	$printer->cut();

	$printer->close();

	$connector2 = new WindowsPrintConnector("zebra2");

	$printer2 = new Escpos($connector2);
	$printer2->text("ทดสอบภาษาไทย");
	$printer2->feed(1);
	$printer2->cut();

	$printer2->close();

	$connector3 = new WindowsPrintConnector("zebra3");

	$printer3 = new Escpos($connector3);
	$printer3->text("ทดสอบภาษาไทย");
	$printer3->feed(1);
	$printer3->cut();
	$printer3->close();

//	$table_number = 15;
//	$table_invoice = "B201508231502";
//	$connector3 = new WindowsPrintConnector("zebra3");
//
//	$printer3 = new Escpos($connector3);
//	$img = new EscposImage("logo1.jpg");
//	$printer3->graphics($img);
//	$printer3->feed(1);
//	//$printer->text("                 ชาบูนางใน                \n");
//	$printer3->text("------------------------------------------\n");
//	$printer3->text("                  โต๊ะ : ".$table_number."\n");
//	$printer3->text("        เลขที่ใบเสร็จ  :  ".$table_invoice."\n");
//	$printer3->text("             วันที่ :  ".date('d/m/y')."\n");
//	$printer3->text("             เวลา : ".date('H:i:s')."\n");
//	$printer3->feed(1);
//	$printer3->cut();
//
//	$printer3->close();

}
catch(Exception $e){
	echo "Couldn't print to this printer ".$e->getMessage();
}

?>
