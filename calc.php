<?php
session_start();
//Есле нет жетона безопасности т.е. сессионно переменной user
if (!isset($_SESSION["user"])) {
    echo ('<meta http-equiv="refresh" content="2; URL=login.php">');
    die("Требуется авторизация!");
}
?>
<html>

<head>

    <!-- Это комментарий HTML -->
    <meta charset="utf-8" />

    <style>
        /* Это комментарий CSS */
        input,
        button {
            width: 140px;
            margin: 5px;
            text-align: center;
        }

        button {
            width: 63px;
        }

        .pressed {
            background-color: pink;
        }
    </style>

    <script>
        function plus() {
            //Это коментарий JS
            var x = document.getElementById("x").value;
            var y = document.getElementById("y").value;

            var url = "api/plus.php?x=" + x + "&y=" + y;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);
            xhr.send();
            var z = xhr.responseText;

            document.getElementById("z").value = z;
            document.getElementById("btn1").className = "pressed";
            document.getElementById("btn2").className = "";
        }

        function minus() {
            var x = document.getElementById("x").value;
            var y = document.getElementById("y").value;

            var url = "api/minus.php?x=" + x + "&y=" + y;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);
            xhr.send();
            var z = xhr.responseText;

            document.getElementById("z").value = z;
            document.getElementById("btn2").className = "pressed";
            document.getElementById("btn1").className = "";
        }
    </script>
</head>

<body>
    <a href="index_.html">вернуться на портал</a>  
    <h1>Калькулятор</h1>
    <input id="x" /> <br />
    <input id="y" /> <br />
    <button id="btn1" onclick="plus();">+</button>
    <button id="btn2" onclick="minus();">-</button><br />
    <input id="z" />
</body>

</html>