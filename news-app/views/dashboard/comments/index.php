<?php require_once("../../../app/config.php"); ?>
<?php require_once("../../../app/db.php"); ?>
<?php require_once("../../../app/validation.php"); ?>
<?php require_once("../../../app/response.php"); ?>
<?php require_once(MAIN_PATH . "views/dashboard/inc/header.php"); ?>
<style>
    .sidebar {
        position: sticky;
        top: 0;
        left: 0;
        height: 100vh;
    }

    .sidebar {
        min-height: 93vh;
    }

    .sideBarItem {
        cursor: pointer;
    }

    .activeSideBarItem {
        color: red;
    }

    .commentDate {
        font-size: 11px;
    }

    .info img {
        width: 30px;
        height: 30px;
    }
</style>
<!-- Main Content-->
<div class="d-flex justify-content-center">
    <div class="col-2 sidebar bg-secondary px-2">
        <h3 class="text-white my-3">Dashboard</h3>
        <div class="px-3 fs-4">
            <a href="<?= URL . "views/dashboard/" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-table-list"></i>Categories</a>
            <a href="<?= URL . "views/dashboard/users" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-user"></i>Users</a>
            <a href="<?= URL . "views/dashboard/articles" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-newspaper"></i>Articles</a>
            <a href="<?= URL . "views/dashboard/comments" ?>" class="text-dark d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-message"></i>Comments</a>
        </div>
    </div>
    <div class="container px-4 px-lg-5">
        <h3 class="text-center my-3">Blog Comments</h3>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <div class="comments">
                    <?php
                    $sql = "SELECT * FROM `comments` WHERE `status` = 'pending'";
                    $fetch_comments_data = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($fetch_comments_data) > 0) : ?>
                        <h3 class="text-info text-center">Pending Comments</h3>
                        <?php while ($row_comments = mysqli_fetch_assoc($fetch_comments_data)) : ?>
                            <div class="border m-2 p-2 rounded-2">
                                <span>Article <?= $row_comments['article_id'] ?></span>
                                <div class="info d-flex align-items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="">
                                    <div>
                                        <h6 class="m-0"><?= $row_comments['name'] ?></h6>
                                        <span class="text-muted commentDate"><?= $row_comments['created_at'] ?></span>
                                    </div>
                                </div>
                                <p class="m-1"><?= $row_comments['content'] ?></p>
                            </div>
                            <div class="btns d-flex align-items-center gap-3 pe-2">
                                <a href="<?= URL . "views/dashboard/comments/" ?>approve.php?id=<?= $row_comments['id'] ?>" class="text-decoration-none btn btn-success w-50">Approve</a>
                                <a href="<?= URL . "views/dashboard/comments/" ?>reject.php?id=<?= $row_comments['id'] ?>" class="text-decoration-none btn btn-danger w-50">Reject</a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php
                ?>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <div class="comments">
                    <?php
                    $sql = "SELECT * FROM `comments` WHERE `status` = 'accepted'";
                    $fetch_comments_data = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($fetch_comments_data) > 0) : ?>
                        <h3 class="text-info text-center">Accepted Comments</h3>
                        <?php while ($row_comments = mysqli_fetch_assoc($fetch_comments_data)) : ?>
                            <div class="border m-2 p-2 rounded-2">
                                <span>Article <?= $row_comments['article_id'] ?></span>
                                <div class="info d-flex align-items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="">
                                    <div>
                                        <h6 class="m-0"><?= $row_comments['name'] ?></h6>
                                        <span class="text-muted commentDate"><?= $row_comments['created_at'] ?></span>
                                    </div>
                                </div>
                                <p class="m-1"><?= $row_comments['content'] ?></p>
                            </div>
                            <div class="btns d-flex align-items-center gap-3 pe-2">
                                <a href="<?= URL . "views/dashboard/comments/" ?>reject.php?id=<?= $row_comments['id'] ?>" class="text-decoration-none btn btn-danger w-100">Reject</a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php
                ?>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 border my-2 py-2 rounded-2">
                <div class="comments">
                    <?php
                    $sql = "SELECT * FROM `comments` WHERE `status` = 'rejected'";
                    $fetch_comments_data = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($fetch_comments_data) > 0) : ?>
                        <h3 class="text-info text-center">Rejected Comments</h3>
                        <?php while ($row_comments = mysqli_fetch_assoc($fetch_comments_data)) : ?>
                            <div class="border m-2 p-2 rounded-2">
                                <span>Article <?= $row_comments['article_id'] ?></span>
                                <div class="info d-flex align-items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="">
                                    <div>
                                        <h6 class="m-0"><?= $row_comments['name'] ?></h6>
                                        <span class="text-muted commentDate"><?= $row_comments['created_at'] ?></span>
                                    </div>
                                </div>
                                <p class="m-1"><?= $row_comments['content'] ?></p>
                            </div>
                            <div class="btns d-flex align-items-center gap-3 pe-2">
                                <a href="<?= URL . "views/dashboard/comments/" ?>approve.php?id=<?= $row_comments['id'] ?>" class="text-decoration-none btn btn-success w-100">Approve</a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php
                ?>
            </div>
        </div>
    </div>
</div>