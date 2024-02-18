<?php
require_once('../../../app/config.php');
require_once('../../../app/validation.php');
require_once('../../../app/response.php');
require_once('../../../app/db.php');
require_once(MAIN_PATH . 'views/dashboard/inc/header.php');
$error= [];
$success= [];
if (isset($_POST['submit'])) {
    $name = sanitize($_POST['name']);
    echo $name;
    if (requiredValue($name) == false) {
        if (minLength($name, "2") && maxLength($name, "20")) {
            $sql = "INSERT INTO `categories` (`name`)
                VALUES ('$name')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $success = "Categorty Added Successfully";
                // redirectTo(URL . "views/dashboard/categories/");
            }
        } else {
            $error = "Please enter valid inputs";
        }
    } else {
        $error = "Please enter all required fields";
    }
}
?>
<?php if ($error) : ?>
    <h5 class="alert alert-danger text-center"><?= $error; ?></h5>
<?php endif; ?>
<?php if ($success) : ?>
    <h5 class="alert alert-success text-center"><?= $success; ?></h5>
<?php endif; ?>

<div class="col-md-6 offset-md-3">
    <h3 class="text-center">Add New Department</h3>
    <form class="my-2 p-3 border" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div class="form-group mb-2">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
    </form>
</div>
<?php require_once(MAIN_PATH . 'views/dashboard/inc/footer.php'); ?>