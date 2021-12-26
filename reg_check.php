<?php
session_start();
include("./include/params.php");
?>
<html>

<head>
    <title></title>
</head>

<body>
    <?php
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = hash('sha256', $pwd);
    $sql_select = "SELECT id FROM users WHERE UserName= '$user'";
    $sql_insert = "INSERT INTO users(UserName,PwdHash) VALUES('$user','$hash')";
    $conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
    $cursor = mysqli_query($conn, $sql_select);
    $cursor1 = mysqli_query($conn, $sql_insert);
    $result = mysqli_fetch_all($cursor);
    mysqli_close($conn);
  
    if (count($result) > 0) {
        echo ("<h2>Такой пользователь уже существует</h2>");
        //mysqli_close($conn);
        echo ('<meta http-equiv="refresh" content="2; URL=newuser.php">');
    } 
    else  {
        $cursor1=='TRUE';
        echo ('!!Новый прользователь добавлен!!');
        echo ('<meta http-equiv="refresh" content="2; URL=index_.html">');
        }
    ?>
</body>

</html>