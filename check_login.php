<?php
session_start();
include("C:/AppParams/params.php");
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
    $sql = "SELECT ID, UserName
                FROM users 
                WHERE UserName=? AND PwdHash=?
                ";

    $conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
    //необходимая процедура передачи параметров в sql-выражение
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($statement, "ss", $user, $hash);
    mysqli_stmt_execute($statement);
    echo (mysqli_error($conn));
    $cursor = mysqli_stmt_get_result($statement);

    $result = mysqli_fetch_all($cursor);
    echo (mysqli_error($conn));
    //var_dump($result);
    mysqli_close($conn);

    if (count($result) > 0) {
        echo ("<h2>hello, $user!!</h2>");
        echo ('<meta http-equiv="refresh" content="2; URL=calc.php">');
        $_SESSION["user"] = $user;
    } else {
        echo ("BAD LOGIN!");
        echo ('<meta http-equiv="refresh" content="2; URL=index_.html">');
    }

    ?>
</body>

</html>