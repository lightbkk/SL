<?php
session_start();


//Это комментарий

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;

//Коннекция, нарушены принципы безопасности:
//1. принцип наименьших привелегий
//2. слабый пароль
//3. секрет в коде

//$user = isset($_COOKIE['user']);
include(getenv("MYAPP_CONFIG"));
$conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);

$sql = "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,'anonym')";
mysqli_query($conn, $sql);
//echo (mysqli_error($conn));
mysqli_close($conn);
echo ($z);
