<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/response.php');
$id = $_GET['id'];

$sql = "UPDATE `users` SET `status` = (CASE WHEN (SELECT `status` FROM `users` WHERE `id` = '$id') = 'active' THEN 'inactive' ELSE 'active' END) WHERE `id` = '$id'";
$res = mysqli_query($conn, $sql);
if ($res){  
    // echo "Successfully updated";
    redirectTo(URL . "views/dashboard/users/");
}