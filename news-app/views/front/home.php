<?php require_once("../../app/config.php"); ?>
<?php require_once("../../app/db.php"); ?>
<?php require_once("../../app/validation.php"); ?>
<?php require_once("../../app/response.php"); ?>
<?php require_once(MAIN_PATH . "views/front/inc/header.php"); ?>
<?php
$sql = "SELECT  *  FROM `articles`";
$res = mysqli_query($conn, $sql);
?>
<style>
    .commentDate {
        font-size: 11px;
    }

    .info img {
        width: 30px;
        height: 30px;
    }
</style>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo URL . "public/" ?>assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <?php
    $error = [];
    $success = [];
    if (isset($_POST['submit'])) {
        $title = sanitize($_POST['title']);
        $description = sanitize($_POST['description']);
        $category_id = sanitize($_POST['category_id']);
        $file = $_FILES['Image'];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];
        $user_id = $data['id'];
        if (requiredValue($title) == false) {
            if (minLength($title, "2") && maxLength($title, "20")) {
                if ($file_name != '') {
                    $ext = pathinfo($file_name);
                    $uploaded_name = $ext['filename'];
                    $uploaded_ext = $ext['extension'];
                    $allowed = array("png", "jpg", "jpeg", "gif");
                    if (in_array($uploaded_ext, $allowed)) {
                        if ($file_error === 0) {
                            if ($file_size < 500000) {
                                $new_name = uniqid('', true) . "." . $uploaded_ext;
                                $file_path = MAIN_PATH . "public/assets/img/" . $new_name;
                                move_uploaded_file($file_tmp_name, $file_path);
                                $server_img = URL . "public/assets/img/" . $new_name;
                                // successfully uploaded
                                $sql = "INSERT INTO `articles`(`title`,`description`,`image`,`status`,`category_id`,`user_id`)
                                VALUES ('$title','$description','$server_img','pending',$category_id,$user_id)";
                                $add_res = mysqli_query($conn, $sql);
                                if ($add_res) {
                                    // $success = "Categorty Added Successfully";
                                }
                            } else {
                                // file is too big
                            }
                        } else {
                            // error uploading
                        }
                    } else {
                        // file ext is not allowed
                    }
                } else {
                    // error message
                }
            } else {
                $error = "Please enter valid inputs";
            }
        } else {
            $error = "Please enter all required fields";
        }
    }
    ?>
    <?php if ($data && ($data['role'] == "admin" || $data['role'] == "writer")) : ?>
        <div class="col-md-6 m-auto">
            <h3 class="text-center">Add New Article</h3>
            <form class="my-2 p-3 border rounded-2" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" name="title" class="form-control rounded-2" id="exampleInputName1">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputName1">description</label>
                    <input type="text" name="description" class="form-control rounded-2" id="exampleInputName1">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputName1">Image</label>
                    <input type="file" name="Image" class="form-control rounded-2" id="exampleInputName1">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputName1">Category id</label>
                    <?php
                    $sql_select = "SELECT  *  FROM `categories`";
                    $res_select = mysqli_query($conn, $sql_select);
                    ?>
                    <select class="form-control rounded-2" name="category_id" id="category_id">
                        <?php if (mysqli_num_rows($res_select) > 0) : ?>
                            <?php while ($row_select = mysqli_fetch_assoc($res_select)) : ?>
                                <option value="<?= $row_select['id'] ?>"><?= $row_select['id'] . "-" . $row_select['name'] ?></option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary form-control rounded-2" name="submit">Submit</button>
            </form>
        </div>
    <?php endif; ?>
    <?php require_once(MAIN_PATH . 'views/dashboard/inc/footer.php'); ?>
    <h3 class="text-center">Articles</h3>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php if (mysqli_num_rows($res) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                    <?php if ($row['status'] === "accepted") : ?>
                        <!-- Post preview-->
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id` = '{$row['user_id']}'";
                        $fetch_data = mysqli_query($conn, $sql);
                        $fetched_user_data = mysqli_fetch_assoc($fetch_data);
                        ?>
                        <div class="post-preview border px-2 rounded-2 my-3">
                            <a href="single-post.php?id=<?= $row['id'] ?>">
                                <h2 class="post-title mt-2"><?= $row['title'] ?></h2>
                                <span class="text-muted postDate"><?= ucwords($fetched_user_data['name']) ?> - <?= $row['created_at'] ?></span>
                                <h3 class="post-subtitle"><?= $row['description'] ?></h3>
                            </a>
                            <div class="mb-3">
                                <img class="rounded-2" src="<?= $row['image'] ?>" alt="post-image">
                            </div>
                            <form action="<?= URL . "views/front/comments.php" ?>" method="POST">
                                <div class="form-group mb-2 border p-2 rounded-2">
                                    <label for="exampleInputName1">Your Name</label>
                                    <input type="text" name="comment_name" class="form-control w-25 rounded-2 my-2" id="exampleInputName1">
                                    <label for="exampleInputName1">Your Comment</label>
                                    <input type="text" name="comment_text" class="form-control rounded-2 my-2" id="exampleInputName1">
                                    <div class="d-flex justify-content-end my-2">
                                        <input type="submit" name="submit" class="btn btn-primary p-2 rounded-2">
                                        <input type="text" name="article_id" hidden value="<?= $row['id'] ?>">
                                    </div>
                                </div>
                            </form>
                            <div class="comments">
                                <?php
                                $sql = "SELECT * FROM `comments` WHERE `article_id` = '{$row['id']}' && `status` = 'accepted'";
                                $fetch_comments_data = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch_comments_data) > 0) : ?>
                                    <?php while ($row_comments = mysqli_fetch_assoc($fetch_comments_data)) : ?>
                                        <div class="border m-2 p-2 rounded-2">
                                            <div class="info d-flex align-items-center gap-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="">
                                                <div>
                                                    <h6 class="m-0"><?= $row_comments['name'] ?></h6>
                                                    <span class="text-muted commentDate"><?= $row_comments['created_at'] ?></span>
                                                </div>
                                            </div>
                                            <p class="m-1"><?= $row_comments['content'] ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>
<?php require_once(MAIN_PATH . "views/front/inc/footer.php"); ?>