<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/response.php');
$id = $_GET['id'];
echo $id;
$sql = "UPDATE `comments` SET `status` = 'rejected' WHERE `id` = '$id'";
$res = mysqli_query($conn, $sql);
redirectTo(URL . "views/dashboard/comments");
?>