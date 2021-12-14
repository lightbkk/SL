<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo ('<meta http-equiv="refresh" content="2; URL=login.php">');
    die("Требуется авторизация!");
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <script>
        function getlog() {
            var url = "api/get_log.php";
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);
            xhr.send();
            var text = xhr.responseText;
            var results = JSON.parse(text);
            console.log(results);
            var out = "";
            var counter = 1;
            for (var i = 0; i < results.length; i++) {
                var calc = results[i];
                console.log(calc);
                var x = calc[1];
                var y = calc[2];
                var z = calc[3];
                out += " x: " + x + " y: " + y + " Result: " + z + "<br />";
                counter += 1;
            }
            document.getElementById("display").innerHTML = out;
            document.getElementById("amounte").innerText = 
            "С Вас USD " + counter;
        }
    </script>
</head>

<body onload="getlog();">
    <h1>Все Ваши вычисления</h1>
    <div id="display"></div>
    <h2 id="amounte"></h2>
</body>

</html>