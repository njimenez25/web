<?php
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 8/1/2015 AD
 * Time: 3:25 PM
 */

$table_num = $_GET['number'];


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


?>

<html>
    <head>
        <meta name="viewport" content="width=device-width ,initial-scale = 1.0">

        <!-- css file-->

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.numpad.css">
        <link type="text/css" href="main.css" rel="stylesheet">
        <!-- script file-->

        <script type="text/javascript" src="bootstrap/js/jquery-1.11.3.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.numpad.js"></script>
        <script>
            $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
            $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
            $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
            $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default"></button>';
            $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
            $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');};

        </script>
        <style type="text/css">
            .nmpd-grid {border: none; padding: 20px; width: 340px; height: 400px;}
            .nmpd-grid>tbody>tr>td {border: none;}

            /* Some custom styling for Bootstrap */
            .qtyInput {display: block;
                width: 100%;
                padding: 6px 12px;
                color: #555;
                background-color: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            }
            .in{
                border: none;
                text-align: center;
                width: 5em;

            }
        </style>

        <script>

            $(document).ready(function(){
                $(".in").numpad();
            });
        </script>
    </head>
    <body>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
        .tg .tg-s6z2{text-align:center}
    </style>
    <form onsubmit="ordersub.disabled = true;" action = "sendorder.php?number=<? echo $table_num ?>" method="post">
        <!--<input name="pass" class="in" placeholder="รหัสผ่าน" style="color: white;">-->
        <table class="tg">
        <tr>
            <th class="tg-s6z2" colspan="4">หมู-เนื้อ</th>
        </tr>
        <tr>
            <td class="tg-s6z2">เมนู</td>
            <td class="tg-s6z2">จำนวน</td>
            <td class="tg-s6z2">เมนู</td>
            <td class="tg-s6z2">จำนวน</td>
        </tr>
        <tr>
            <td class="tg-031e">หมูสันนอก</td>
            <td class="tg-031e"><input class="in"name="meat1"></td>
            <td class="tg-031e">หมูสันคอ</td>
            <td class="tg-031e"><input class="in" name="meat2"></td>
        </tr>
        <tr>
            <td class="tg-031e">หมูสามชั้น</td>
            <td class="tg-031e"><input class="in" name="meat3"></td>
            <td class="tg-031e">ตับหมู</td>
            <td class="tg-031e"><input class="in" name="meat4"></td>
        </tr>
        <tr>
            <td class="tg-031e">เนื้อวัว</td>
            <td class="tg-031e"><input class="in" name="meat5"></td>
            <td class="tg-031e"></td>
            <td class="tg-031e"></td>
        </tr>
        <tr>
            <td class="tg-s6z2" colspan="4">อาหารทะเล</td>
        </tr>
        <tr>
            <td class="tg-s6z2">เมนู</td>
            <td class="tg-s6z2">จำนวน</td>
            <td class="tg-s6z2">เมนู</td>
            <td class="tg-s6z2">จำนวน</td>
        </tr>
        <tr>
            <td class="tg-031e">กุ้ง</td>
            <td class="tg-031e"><input class="in" name="seafood1"></td>
            <td class="tg-031e">ปลาหมึก</td>
            <td class="tg-031e"><input class="in" name="seafood2"></td>
        </tr>
        <tr>
            <td class="tg-s6z2" colspan="4">ลูกชิ้น-อื่นๆ</td>
        </tr>
        <tr>
            <td class="tg-031e">เมนู</td>
            <td class="tg-031e">จำนวน</td>
            <td class="tg-031e">เมนู</td>
            <td class="tg-031e">จำนวน</td>
        </tr>
        <tr>
            <td class="tg-031e">คริสตัลไข่เค็ม</td>
            <td class="tg-031e"><input class="in" name="other1"></td>
            <td class="tg-031e">เต้าหู้ชีสลาวา</td>
            <td class="tg-031e"><input class="in" name="other2"></td>
        </tr>
        <tr>
            <td class="tg-031e">ฟองเต้าหู้ซีฟู้ด</td>
            <td class="tg-031e"><input class="in" name="other3"></td>
            <td class="tg-031e">ปูอัดทอด</td>
            <td class="tg-031e"><input class="in" name="other4"></td>
        </tr>
        <tr>
            <td class="tg-031e">ลูกชิ้นแจ่ว</td>
            <td class="tg-031e"><input class="in" name="other5"></td>
            <td class="tg-031e">ลูกชิ้นภูเก็ต</td>
            <td class="tg-031e"><input class="in" name="other6"></td>
        </tr>
        <tr>
            <td class="tg-031e">เต้าหู้ปลา</td>
            <td class="tg-031e"><input class="in" name="other7"></td>
            <td class="tg-031e">เกี๊ยวปลา</td>
            <td class="tg-031e"><input class="in" name="other8"></td>
        </tr>
        <tr>
            <td class="tg-031e">เกี๊ยวกุ้ง</td>
            <td class="tg-031e"><input class="in" name="other9"></td>
            <td class="tg-031e">เกี๊ยวปู</td>
            <td class="tg-031e"><input class="in" name="other10"></td>
        </tr>
        <tr>
            <td class="tg-031e">หมี่หยก</td>
            <td class="tg-031e"><input class="in" name="other11"></td>
            <td class="tg-031e">อุด้ง</td>
            <td class="tg-031e"><input class="in" name="other12"></td>
        </tr>

            <tr>
                <td class="tg-s6z2" colspan="4">โปรโมชั่น</td>
            </tr>
            <tr>
                <td class="tg-031e">กุ้งแม่น้ำ</td>
                <td class="tg-031e"><input class="in" name="promo1"></td>
                <td class="tg-031e">หอยแมลงภู่</td>
                <td class="tg-031e"><input class="in" name="promo2"></td>
            </tr>
            <tr>
                <td class="tg-031e">หอยเชลล์</td>
                <td class="tg-031e"><input class="in" name="promo3"></td>
                <td class="tg-031e">แซลม่อน</td>
                <td class="tg-031e"><input class="in" name="promo4"></td>
            </tr>

        <tr>
            <td class="tg-s6z2" colspan="4">เครื่องดื่ม</td>
        </tr>
            <tr>
                <td class="tg-031e">เบียร์สิงห์</td>
                <td class="tg-031e"><input class="in" name="beer1"></td>
                <td class="tg-031e">โปรเบียร์สิงห์</td>
                <td class="tg-031e"><input class="in" name="beer2"></td>
            </tr>
            <tr>
                <td class="tg-031e">โซดาสิงห์</td>
                <td class="tg-031e"><input class="in" name="beer3"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
            </tr>
        </table>
        <br><br>
        <input type="submit" name = "ordersub">
    </form>

    </body>

</html>
