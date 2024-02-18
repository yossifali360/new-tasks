<?php
require_once('../../app/config.php');
require_once('../../app/db.php');
require_once(MAIN_PATH . 'views/dashboard/inc/header.php');
$sql = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $sql);
?>
<style>
    .sidebar {
        min-height: 93vh;
    }

    .sideBarItem {
        cursor: pointer;
    }

    .activeSideBarItem {
        color: red;
    }
</style>
<div class="d-flex align-items-center justify-content-center">
    <div class="col-2 sidebar bg-secondary px-2">
        <h3 class="text-white my-3">Dashboard</h3>
        <div class="px-3 fs-4">
            <a href="<?= URL . "views/dashboard/" ?>" class="text-dark d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-table-list"></i>Categories</a>
            <a href="<?= URL . "views/dashboard/users" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-user"></i>Users</a>
            <a href="<?= URL . "views/dashboard/articles" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-newspaper"></i>Articles</a>
            <a href="<?= URL . "views/dashboard/comments" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-message"></i>Comments</a>
        </div>
    </div>
    <div class="container col-9">
        <h1 class="my-5 text-center">All Categories</h1>
        <div class="d-flex gap-2 justify-content-end">
            <a class="text-decoration-none btn btn-primary mb-3" href="<?= URL . 'views/dashboard/categories/add.php' ?>">Add New Category</a>
            <a class="text-decoration-none btn btn-danger mb-3" href="<?= URL . 'views/dashboard/categories/add.php' ?>">Delete All</a>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($res) > 0) : ?>
                        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td>
                                    <a class="btn btn-info w-100" href="<?= URL . "views/dashboard/categories/" ?>edit.php?id=<?= $row['id'] ?>"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger w-100" href="<?= URL . "views/dashboard/categories/" ?>delete.php?id=<?= $row['id'] ?>"> <i class="fa fa-close"></i> </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once(MAIN_PATH . 'views/dashboard/inc/footer.php'); ?>