<?php
/**
 * Created by PhpStorm.
 * User: Office
 * Date: 8/25/2015
 * Time: 1:48 AM
 */

$table_num = $_GET['number'];

?>

<form action = "checkcode.php?number=<?echo $table_num ?>" method="post">
    <input name="pass">
    <button type="submit">Login</button>
</form>
