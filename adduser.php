<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 8/25/2015
 * Time: 4:16 AM
 */

$userid = $_POST['userid'];
$username = $_POST['username'];


$servername = "127.0.0.1";
$username = "kajornsak";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_table VALUES ( ".$userid." , '".$username."')";

$result = mysqli_query($conn,$sql);

$conn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
