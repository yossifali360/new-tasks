<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../app/response.php');
require_once(MAIN_PATH . 'views/dashboard/inc/header.php');
$id = $_GET['id'];
$sql = "SELECT  *  FROM `categories` WHERE (`id`) = ('$id')";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
if (isset($_POST['submit'])) {
    $newname = $_POST['newname'];
    echo $newname;
    $sql = "UPDATE `categories` SET `name` = '$newname' WHERE `id` = '$id'";
    $res = mysqli_query($conn, $sql);
    redirectTo(URL . "views/dashboard/categories/");
}

?>
<div class="col-md-6 offset-md-3">
    <h3 class="text-center">Edit Department</h3>
    <form class="my-2 p-3 border" method="POST" action="<?= $_SERVER['PHP_SELF'] . "?id=$id" ?>">
        <div class="form-group mb-2">
            <label for="exampleInputName1">OldName</label>
            <input disabled type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputName1">New Name</label>
            <input type="text" name="newname" class="form-control" id="exampleInputName1">
        </div>
        <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
    </form>
</div>
<?php require_once(MAIN_PATH . 'views/dashboard/inc/footer.php'); ?>