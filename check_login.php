<?php
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 7/30/2015 AD
 * Time: 8:22 PM
 */

session_start();
$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername,$username,$password,$dbname);




$sql = "SELECT * FROM account_table WHERE user_name = '".$_POST['txtUsername']."'AND user_pass ='".$_POST['txtPassword']."'";

$result = mysqli_query($conn,$sql);

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['user_name'] = $row['user_name'];
    session_write_close();
    if($row['user_type'] == 'admin'){
        header("location:index.php");
    }
    else{
        header("location:pos.php");
    }
    mysqli_close($conn);
}
else{
    echo "Failed <br>";
    echo $_POST['txtUsername'].' '.$_POST['txtPassword'];


}
