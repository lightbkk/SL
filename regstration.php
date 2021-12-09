<?php
session_start();
include(getenv("MYAPP_CONFIG"));
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
    $sql_select = "SELECT ID, UserName
    FROM users 
    WHERE UserName= '$user'
    ";
    $sql_insert = "INSERT INTO users
    SET UserName= '$user', PwdHash= '$hash'";
   
    $conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
    //$statement = mysqli_prepare($conn, $sql_select);
    //mysqli_stmt_bind_param($statement, "ss", $user);
    //mysqli_stmt_execute($statement);
    //echo (mysqli_error($conn));
    //$cursor = mysqli_stmt_get_result($statement);
    $cursor = mysqli_query($conn,$sql_select);
    $result = mysqli_fetch_all($cursor);
    echo (mysqli_error($conn));
    //var_dump($result);
    mysqli_close($conn);

    if (count($result) > 0) {
        echo ("<h2>Такой пользователь уже существует</h2>");
        echo ('<meta http-equiv="refresh" content="2; URL=newuser.php">');
       
    } 
    else {
        $conn = mysqli_connect($DB_URL, $DB_USER, $DB_PWD, $DB_NAME);
        mysqli_query($conn,$sql_insert)
        echo ("Новый прользователь добавлен");
        echo ('<meta http-equiv="refresh" content="2; URL=index_.html">');
        mysqli_close($conn);
    }
    ?>
</body>

</html>