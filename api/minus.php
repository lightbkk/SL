<?php
session_start();


$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$user = $_SESSION["user"];
$z = $x - $y;


include("./include/params.php");
$conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
$sql = "INSERT INTO log(Number1,Number2,Result,UserID,TimeStamp) VALUES($x,$y,$z,'$user',now())";
mysqli_query($conn, $sql);
mysqli_close($conn);
echo ($z);
