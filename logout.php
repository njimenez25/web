<?php
/**
 * Created by PhpStorm.
 * User: kajornsak
 * Date: 7/30/2015 AD
 * Time: 11:17 PM
 */

session_start();
session_destroy();
header("location:login.php");
?>