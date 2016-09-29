<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 8/24/2015
 * Time: 10:58 AM
 */
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

/*
$pass = $_POST['pass'];

$sql = "SELECT username FROM user_table WHERE userid = ".$pass;
$query = mysqli_query($conn,$sql);


if($query->num_rows == 0){
    $conn->close();
    //exit();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
*/



//$result = $query->fetch_assoc();
//$user_name = $result['username'];

$table_number = $_GET['number'];
$meat1 = $_POST['meat1'];
$meat2 = $_POST['meat2'];
$meat3 = $_POST['meat3'];
$meat4 = $_POST['meat4'];
$meat5 = $_POST['meat5'];

$seafood1 = $_POST['seafood1'];
$seafood2 = $_POST['seafood2'];

$other1 = $_POST['other1'];
$other2 = $_POST['other2'];
$other3 = $_POST['other3'];
$other4 = $_POST['other4'];
$other5 = $_POST['other5'];
$other6 = $_POST['other6'];
$other7 = $_POST['other7'];
$other8 = $_POST['other8'];
$other9 = $_POST['other9'];
$other10 = $_POST['other10'];
$other11 = $_POST['other11'];
$other12 = $_POST['other12'];

$promo1 = $_POST['promo1'];
$promo2 = $_POST['promo2'];
$promo3 = $_POST['promo3'];
$promo4 = $_POST['promo4'];

$beer1 = $_POST['beer1'];
$beer2 = $_POST['beer2'];
$beer3 = $_POST['beer3'];
$arr = array();
$beerarray = array();

$beerarray[] = $beer1;
$beerarray[] = $beer2;
$beerarray[] = $beer3;
$arr[] = $meat1;
$arr[] = $meat2;
$arr[] = $meat3;
$arr[] = $meat4;
$arr[] = $meat5;

$arr[] = $seafood1;
$arr[] = $seafood2;

$arr[] = $other1;
$arr[] = $other2;
$arr[] = $other3;
$arr[] = $other4;
$arr[] = $other5;
$arr[] = $other6;
$arr[] = $other7;
$arr[] = $other8;
$arr[] = $other9;
$arr[] = $other10;
$arr[] = $other11;
$arr[] = $other12;

$arr[] = $promo1;
$arr[] = $promo2;
$arr[] = $promo3;
$arr[] = $promo4;
$food = array('หมูสันนอก','หมูสันคอ','หมูสามชั้น','ตับหมู','เนื้อวัว','กุ้ง','ปลาหมึก','คริสตัลไข่เค็ม','เต้าหู้ชีสลาวา','ฟองเต้าหู้ซีฟู้ด'
,'ปูอัดทอด','ลูกชิ้นแจ่ว','ลูกชิ้นภูเก็ต','เต้าหู้ปลา','เกี๊ยวปลา','เกี๊ยวกุ้ง','เกี๊ยวปู','หมี่หยก','อุด้ง','กุ้งแม่น้ำ','หอยแมลงภู่','หอยเซลล์'
,'แซลม่อน');

$beer = array('เบียร์สิงห์','โปรเบียร์สิงห์','โซดาสิงห์');
$dbbeer = array('beer1','beer2','beer3');

$dbfood = array("meat1","meat2","meat3","meat4","meat5","seafood1","seafood2","other1","other2","other3"
,"other4","other5","other6","other7","other8","other9","other10","other11","other12","promo1","promo2","promo3"
,"promo4");


foreach ($arr as &$x){
    if($x == '') {
        $x = 0;
    }
}

foreach ($beerarray as &$x){
    if($x == ''){
        $x = 0;
    }
}


$connector = new WindowsPrintConnector("zebra");
$printer = new Escpos($connector);
$connector2 = new WindowsPrintConnector("zebra2");
$printer2 = new Escpos($connector2);

//printer1
if($table_number == 999){
    $printer->text("                 โต๊ะ  Office\n");
    $printer2->text("                 โต๊ะ Office\n");
}
else {
    $printer->text("                 โต๊ะ  " . $table_number . "\n");
    $printer2->text("                 โต๊ะ  " . $table_number . "\n");
}
$printer2->text("               เวลา  ".date("H:i")."\n");
$printer->text("               เวลา  ".date("H:i")."\n");

//$printer->text("             พนักงาน : ".$user_name."\n");
//$printer2->text("             พนักงาน : ".$user_name."\n");




for($i = 0 ; $i < 23 ; $i++){

    if($arr[$i] != 0){
        if($i == 5 and $arr[$i] != 0){
            $printer->feed(1);
            $printer2->feed(1);
            $printer->cut();
            $printer2->cut();

            $printer->text("                 โต๊ะ  " . $table_number . "\n");
            $printer2->text("                 โต๊ะ  " . $table_number . "\n");

            $printer2->text("               เวลา  ".date("H:i")."\n");
            $printer->text("               เวลา  ".date("H:i")."\n");
        }
        else if($i == 19  and $arr[$i] != 0){
            $printer->feed(1);
            $printer2->feed(1);
            $printer->cut();
            $printer2->cut();

            $printer->text("                 โต๊ะ  " . $table_number . "\n");
            $printer2->text("                 โต๊ะ  " . $table_number . "\n");

            $printer2->text("               เวลา  ".date("H:i")."\n");
            $printer->text("               เวลา  ".date("H:i")."\n");
        }
        $printer->text("       ".$food[$i]."         ".$arr[$i]."\n");
        $printer2->text("       ".$food[$i]."         ".$arr[$i]."\n");

    }
}

for($i = 0; $i < 3 ; $i++){
    if($beerarray[$i] != 0){
        $printer->text("       ".$beer[$i]."         ".$beerarray[$i]."\n");
        $printer2->text("       ".$beer[$i]."         ".$beerarray[$i]."\n");
    }
}
$printer->feed(1);
$printer2->feed(1);
$printer->cut();


$printer2->cut();

$printer->close();
$printer2->close();







$sql = 'SELECT invoice_id FROM table_detail WHERE table_status = "open" AND table_number = '
    .$table_number;

$query = mysqli_query($conn,$sql);

$result = $query->fetch_assoc();

$table_invoice = $result['invoice_id'];
//echo $table_invoice;

$sql = "SELECT * FROM beer_table WHERE invoice_id = '".$table_invoice."';";
$query = mysqli_query($conn,$sql);

if($query->num_rows == 0){
    $sql = 'INSERT INTO beer_table ( invoice_id , beer1 , beer2 ,beer3 ) VALUES("'.$table_invoice.'",'.$beerarray[0].','.$beerarray[1].','.$beerarray[2].');';
    $result = mysqli_query($conn,$sql);
    //echo $beerarray;
    echo mysqli_error($conn);
}
else{
    $sql = "SELECT beer1 , beer2 , beer3 FROM beer_table WHERE invoice_id = '".$table_invoice."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();

    for($i = 0;$i < 3 ;$i++){
        $beerarray[$i] += $row[$dbbeer[$i]];
        echo $beerarray[$i];
    }

    for($i = 0;$i < 3; $i++){
        if($beerarray[$i] != 0){
            $sql = "UPDATE beer_table SET ".$dbbeer[$i]." = ".$beerarray[$i]." WHERE invoice_id = '".$table_invoice."'";
            $result = mysqli_query($conn,$sql);
            echo mysqli_error($conn);
        }
    }
}

$sql = "SELECT * FROM order_table WHERE invoice_id = '".$table_invoice."';";
$query = mysqli_query($conn,$sql);
if($query->num_rows == 0){
    $sql = 'INSERT INTO order_table ( invoice_id , meat1 , meat2 , meat3 , meat4 , meat5 , seafood1 , seafood2 , other1
, other2 , other3 , other4 , other5 , other6 , other7 , other8 , other9 , other10 , other11 , other12 , promo1 , promo2 , promo3 , promo4
 ) VALUES
( "'.$table_invoice.'" , '.$arr[0].' , '.$arr[1].' , '. $arr[2].' , '.$arr[3].' , '.$arr[4].' , '.$arr[5].' , '.$arr[6].' ,
'.$arr[7].' , '.$arr[8].' , '.$arr[9].' , '.$arr[10].' , '.$arr[11]. ' , '.$arr[12].' , '.$arr[13].' , '.$arr[14].' , '.$arr[15].' ,
'.$arr[16].' , '.$arr[17].' , '.$arr[18].' , '.$arr[19].' , '.$arr[20].' , '.$arr[21].' , '.$arr[22].' );';


    $result = mysqli_query($conn,$sql);


    echo $sql;
    echo mysqli_error($conn);
    $conn->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else{
    $sql = "SELECT meat1 , meat2 , meat3 , meat4 , meat5 , seafood1 , seafood2 , other1
, other2 , other3 , other4 , other5 , other6 , other7 , other8 , other9 , other10 , other11 , other12 , promo1 , promo2 , promo3 , promo4
 FROM order_table WHERE invoice_id ='".$table_invoice."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();


    for($i = 0 ; $i < 23 ; $i++){
        $arr[$i] += $row[$dbfood[$i]];
        //echo $arr[$i];
    }



    for($i = 0 ; $i < 23 ; $i++) {
        if ($arr[$i] != 0) {

            $sql = "UPDATE order_table SET " . $dbfood[$i] . " = " . $arr[$i] . " WHERE invoice_id = '" . $table_invoice . "';";
            $result = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
        }
    }
    $conn->close();
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>