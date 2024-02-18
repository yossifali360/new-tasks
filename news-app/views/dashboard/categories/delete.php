<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/response.php');
$id = $_GET['id'];

$sql = "DELETE FROM `categories` WHERE `id` = '$id'";
$res = mysqli_query($conn, $sql);
if ($res){
    redirectTo(URL . "views/dashboard/categories/");
}