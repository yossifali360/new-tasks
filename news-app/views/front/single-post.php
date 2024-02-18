<?php require_once("../../app/config.php"); ?>
<?php require_once("../../app/db.php"); ?>
<?php require_once("../../app/validation.php"); ?>
<?php require_once("../../app/response.php"); ?>
<?php require_once(MAIN_PATH . "views/front/inc/header.php"); ?>
<?php
$id = $_GET['id'];
$sql = "SELECT  *  FROM `articles` WHERE `id` = $id";
$res = mysqli_query($conn, $sql);
$fetched_data = mysqli_fetch_assoc($res);
?>
<style>
    .postimg{
        width: 800px;
        height: 500px;
    }
</style>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="section-heading"><?= $fetched_data['title'] ?></h2>
                <p><?= $fetched_data['description'] ?></p>
                <img src="<?=$fetched_data['image']?>" class="postimg" alt="">
            </div>
        </div>
    </div>
</article>
<?php require_once(MAIN_PATH . "views/front/inc/footer.php"); ?>