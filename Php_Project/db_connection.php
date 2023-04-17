<?php
function db_connect() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "phpproject";

    $connection = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    return $connection;
}
?>
