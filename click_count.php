<?php
session_start();
?>
<html>

<head>

</head>

<body>
    <a href="index_.html">вернуться на портал</a>  
    <h1>считаем щелчки</h1>
    <form>
        <button id="btn1" ;">Щелкнуть!</button>
    </form>
    <?php
    $i = 0;


    //вспомним переменную счетчика
    //if (isset($_SESSION["clicks"]))
    //$i = $_SESSION["clicks"];
    //$i += 1;
    //запомним текущее значение счетчика щелчков
    //в сессионной переменной clicks
    //$_SESSION["clicks"] = $i;

    
    if (isset($_COOKIE['clicks']));
    $i = $_COOKIE['clicks'];

    $i += 1;
    setcookie("clicks", $i, time() + 20);

    echo ("Всего щелчков: $i");
    ?>
</body>

</html>