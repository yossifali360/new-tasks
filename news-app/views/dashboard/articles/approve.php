<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/response.php');
$id = $_GET['id'];
echo $id;
$sql = "UPDATE `articles` SET `status` = 'accepted' WHERE `id` = '$id'";
$res = mysqli_query($conn, $sql);
redirectTo(URL . "views/dashboard/articles");
?>
<!-- rejected -->