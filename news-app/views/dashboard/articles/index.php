<?php require_once("../../../app/config.php"); ?>
<?php require_once("../../../app/db.php"); ?>
<?php require_once("../../../app/validation.php"); ?>
<?php require_once("../../../app/response.php"); ?>
<?php require_once(MAIN_PATH . "views/dashboard/inc/header.php"); ?>

<style>
    .postImg {
        height: 300px;
    }
    .sidebar{
        position: sticky;
        top: 0;
        left: 0;
        height: 100vh;
    }
</style>
<!-- Main Content-->
<div class="d-flex justify-content-center">
    <div class="col-2 sidebar bg-secondary px-2">
        <h3 class="text-white my-3">Dashboard</h3>
        <div class="px-3 fs-4">
            <a href="<?= URL . "views/dashboard/" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-table-list"></i>Categories</a>
            <a href="<?= URL . "views/dashboard/users" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-user"></i>Users</a>
            <a href="<?= URL . "views/dashboard/articles" ?>" class="text-dark d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-newspaper"></i>Articles</a>
            <a href="<?= URL . "views/dashboard/comments" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-message"></i>Comments</a>
        </div>
    </div>
    <div class="container px-4 px-lg-5">
        <h3 class="text-center my-3">Blog Posts</h3>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <?php
                $sql = "SELECT  *  FROM `articles` WHERE `status` = 'pending'";
                $res = mysqli_query($conn, $sql);
                ?>
                <?php if (mysqli_num_rows($res) > 0) : ?>
                    <h3 class="text-info text-center">Pending Posts</h3>
                    <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id` = '{$row['user_id']}'";
                        $fetch_data = mysqli_query($conn, $sql);
                        $fetched_user_data = mysqli_fetch_assoc($fetch_data);
                        ?>
                        <!-- Post preview-->
                        <h3></h3>
                        <div class="post-preview border rounded-2 p-2 mb-4">
                            <a class="text-decoration-none" href="post.html">
                                <h2 class="post-title text-dark"><?= $row['title'] ?></h2>
                                <span class="text-muted postDate"><?= ucwords($fetched_user_data['name']) ?> - <?= $row['created_at'] ?></span>
                                <h3 class="post-subtitle text-dark"><?= $row['description'] ?></h3>
                            </a>
                            <div class="mb-3">
                                <img class="rounded-2 w-100 postImg" src="<?= $row['image'] ?>" alt="post-image">
                            </div>
                            <div class="btns d-flex align-items-center gap-3 pe-2">
                                <a href="<?= URL . "views/dashboard/articles/" ?>approve.php?id=<?= $row['id'] ?>" class="text-decoration-none btn btn-success w-50">Approve</a>
                                <a href="<?= URL . "views/dashboard/articles/" ?>reject.php?id=<?= $row['id'] ?>" class="text-decoration-none btn btn-danger w-50">Reject</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <?php
                $sql = "SELECT  *  FROM `articles`WHERE `status` = 'accepted'";
                $res = mysqli_query($conn, $sql);
                ?>
                <?php if (mysqli_num_rows($res) > 0) : ?>
                    <h3 class="text-success text-center">Accepted Posts</h3>
                    <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id` = '{$row['user_id']}'";
                        $fetch_data = mysqli_query($conn, $sql);
                        $fetched_user_data = mysqli_fetch_assoc($fetch_data);
                        ?>
                        <!-- Post preview-->
                        <h3></h3>
                        <div class="post-preview border rounded-2 p-2 mb-4">
                            <a class="text-decoration-none" href="post.html">
                                <h2 class="post-title text-dark"><?= $row['title'] ?></h2>
                                <span class="text-muted postDate"><?= ucwords($fetched_user_data['name']) ?> - <?= $row['created_at'] ?></span>
                                <h3 class="post-subtitle text-dark"><?= $row['description'] ?></h3>
                            </a>
                            <div class="mb-3">
                                <img class="rounded-2 w-100 postImg" src="<?= $row['image'] ?>" alt="post-image">
                            </div>
                            <div class="btns d-flex align-items-center gap-3 pe-2">
                                <a href="<?= URL . "views/dashboard/articles/" ?>reject.php?id=<?= $row['id'] ?>" class="text-decoration-none btn btn-danger w-100">Return Rejected</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <?php
                $sql = "SELECT  *  FROM `articles`WHERE `status` = 'rejected'";
                $res = mysqli_query($conn, $sql);
                ?>
                <?php if (mysqli_num_rows($res) > 0) : ?>
                    <h3 class="text-danger text-center">Rejected Posts</h3>
                    <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id` = '{$row['user_id']}'";
                        $fetch_data = mysqli_query($conn, $sql);
                        $fetched_user_data = mysqli_fetch_assoc($fetch_data);
                        ?>
                        <?php if ($row['status'] === "rejected") : ?>
                            <!-- Post preview-->
                            <h3></h3>
                            <div class="post-preview border rounded-2 p-2 mb-4">
                                <a class="text-decoration-none" href="post.html">
                                    <h2 class="post-title text-dark"><?= $row['title'] ?></h2>
                                    <span class="text-muted postDate"><?= ucwords($fetched_user_data['name']) ?> - <?= $row['created_at'] ?></span>
                                    <h3 class="post-subtitle text-dark"><?= $row['description'] ?></h3>
                                </a>
                                <div class="mb-3">
                                    <img class="rounded-2 w-100 postImg" src="<?= $row['image'] ?>" alt="post-image">
                                </div>
                                <div class="btns d-flex align-items-center gap-3 pe-2">
                                    <a href="<?= URL . "views/dashboard/articles/" ?>approve.php?id=<?= $row['id'] ?>" class="text-decoration-none btn btn-success w-100">Approve</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>