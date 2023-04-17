<?php

$host = "localhost"; // your database host
$user = "root"; // your database username
$password = ""; // your database password
$dbname = "phpproject"; // your database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
