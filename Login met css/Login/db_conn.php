<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "test_db2";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
