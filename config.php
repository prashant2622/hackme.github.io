<?php
$host = "localhost";
$user = "root";
$pwd = "";
$link = mysqli_connect($host,$user,$pwd);
$db = "hackme";
mysqli_select_db($link,$db);
?>