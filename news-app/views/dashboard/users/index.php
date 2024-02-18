<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once(MAIN_PATH . 'views/dashboard/inc/header.php');
$sql = "SELECT * FROM `users`";
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
<div class="d-flex justify-content-center">
    <div class="col-2 sidebar bg-secondary px-2">
        <h3 class="text-white my-3">Dashboard</h3>
        <div class="px-3 fs-4">
            <a href="<?= URL . "views/dashboard/" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-table-list"></i>Categories</a>
            <a href="<?= URL . "views/dashboard/users" ?>" class="text-dark d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-user"></i>Users</a>
            <a href="<?= URL . "views/dashboard/articles" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-newspaper"></i>Articles</a>
            <a href="<?= URL . "views/dashboard/comments" ?>" class="text-white d-flex text-decoration-none align-items-center gap-2 my-2 sideBarItem"><i class="fa-solid fa-message"></i>Comments</a>
        </div>
    </div>
    <div class="container col-9">
        <h1 class="my-5 text-center">All Accounts</h1>
        <div class="d-flex gap-2 justify-content-end">
            <a class="text-decoration-none btn btn-primary mb-3" href="<?= URL . 'views/dashboard/users/add.php' ?>">Add New Account</a>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($res) > 0) : ?>
                        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <a class="btn <?= $row['status'] == "active" ? "btn-danger" : "btn-success" ?> w-100" href="<?= URL . "views/dashboard/users/" ?>change.php?id=<?= $row['id'] ?>"><?= $row['status'] == "active" ? "Disable" : "Active" ?></a>
                                </td>
                                <td>
                                    <a class="btn btn-danger w-100" href="<?= URL . "views/dashboard/users/" ?>delete.php?id=<?= $row['id'] ?>"> <i class="fa-solid fa-trash"></i> </a>
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