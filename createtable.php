
<?php
require_once(dirname(__FILE__)."/escpos/Escpos.php");
date_default_timezone_set("Asia/Bangkok");
$table_number = $_GET['number'];


$adult_amount = $_POST['adultamount'];
$half_amount = $_POST['halfamount'];
$free_amount = $_POST['freeamount'];
$table_discount = ' ';
$adult_promotion = 299;
$half_promotion = 150;
$free_promotion = 0;
$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";
$thisdate = date("Ymd");
// Create connection
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
    $sql = "SELECT COUNT(*) AS table_count FROM table_detail WHERE table_date='".$thisdate."'";
    $result = mysqli_query($conn,$sql);

    $row = $result->fetch_assoc();

    $count = intval($row['table_count']);
    $count = $count+1;

    if(strlen($count) < 2){
        $count = '00'.$count;
    }
    if(strlen($count) < 3){
        $count = '0'.$count;
    }
    $table_open = date("H:i:s");
    $table_close = ' ';
    $table_total = '';
    $adult_price = $adult_amount*$adult_promotion;
    $half_price = $half_amount*$half_promotion;
    $free_price = $free_amount*$free_promotion;
    $table_subtotal = $adult_price+$half_price;
    $table_invoice = "B".date("Ymd").$count;
    $table_promocode = 'xxxx'.$table_discount;
    $table_status = "open";
//echo $_SESSION['user_name'];

    $sql = "SELECT table_status FROM table_table WHERE table_number=".$table_number;
    $query = mysqli_query($conn,$sql);
    $check = $query->fetch_assoc();
    $status = $check['table_status'];
    if($status == "not-available"){
        echo "duplicated";
    }
    else{
        echo "not duplicate";
    }


    $sql = "INSERT INTO table_detail (invoice_id, table_date,table_number, adult_amount, half_amount, free_amount, table_open, table_close,table_status, table_discount, table_promocode, table_subtotal, table_total)
VALUES ('".$table_invoice."','".$thisdate."','".$table_number."','".$adult_amount."','".$half_amount."','".$free_amount."','".$table_open."','".$table_close."','".$table_status."','".$table_discount."','".$table_promocode."','".$table_subtotal."','".$table_total."')";

    $result = mysqli_query($conn,$sql);

    if($table_number == 999){
    $sql = "UPDATE table_table SET table_status='office' WHERE table_number=".$table_number;
    $result = mysqli_query($conn,$sql);
}
else{
    $sql = "UPDATE table_table SET table_status='not-available' WHERE table_number=".$table_number;
    $result = mysqli_query($conn,$sql);
}


    $conn->close();

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
    //$printer3->text("          พนักงาน : ".$user_name."\n");
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
    $printer3->feed(1);
    $printer3->text("------------------------------------------\n");
    $printer3->feed(1);
    $printer3->cut();

    $printer3->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);



?>

