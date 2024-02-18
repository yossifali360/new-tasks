<?php
try {
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $database = "news_app";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
} catch (Throwable $e) {
    die("Could not connect to database" . $e->getMessage());
}
