<?php
session_start();
include("./include/params.php");
if (!isset($_SESSION["user"])) {
    echo ('<meta http-equiv="refresh" content="2; URL=../login.php">');
    die("Требуется авторизация!");
}
$user = $_SESSION["user"];
$sql = "SELECT ID, Number1, Number2, Result, UserID
                FROM log 
                WHERE UserID='$user'
                ";
$conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
//необходимая процедура передачи параметров в sql-выражение
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($statement);
echo (mysqli_error($conn));
$cursor = mysqli_stmt_get_result($statement);
$result = mysqli_fetch_all($cursor);
echo (mysqli_error($conn));
mysqli_close($conn);
echo (json_encode($result));
