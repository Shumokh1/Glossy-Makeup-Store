<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "makeup";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
$sSQL = 'SET CHARACTER SET utf8';
mysqli_query($conn, $sSQL);