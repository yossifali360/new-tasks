<?php
session_start();
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/validation.php');
require_once('../../../app/response.php');
$username = sanitize($_POST['username']);
$password = sanitize($_POST['password']);
$sql = "SELECT * FROM `users` WHERE `username` = '$username' && `password` = '$password'";
$res = mysqli_query($conn, $sql);
if ($res) {
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        if ($data['status'] === 'active') {
            $_SESSION['login'] = $data;
            redirectTo(URL."views/front/");
        } else {
            echo "inactive";
        }
    } else {
        echo "wrong";
    }
}
