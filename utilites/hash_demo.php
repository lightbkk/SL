<?php

$pwd = "12345";
$hashed_pwd = hash('sha256', $pwd);
echo ($hashed_pwd);
