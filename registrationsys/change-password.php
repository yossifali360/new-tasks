


<?php include("inc/header.php"); ?>

<div class="container">

<div class="row">

<div class="col-12">

<h1 class="text-center display-4 border my-5 p-2"> Change Password</h1>

</div>

<div class="col-sm-6 mx-auto">

<div class="border p-5 my-3">

<?php if(isset  ($_SESSION['error'])):?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['error'];  ?> </div>
                    <?php unset($_SESSION['error']);?>
                    <?php endif; ?>

<form action="handler/change-password.php" method="POST">
<div class="form-group">

<input type="password" class="form-control" name="old password" placeholder="Your Old Password">

</div>

<input type="password" class="form-control" name="new_password" placeholder="Your new Password">

<div class="form-group">

</div>

<div class="form-group">

<input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">

</div>

<div class="form-group">

<input type="submit" name="submit" class="btn btn-block btn-primary" value="Save">



</div>

</form>

</div>

</div>

</div>

</div>

<?php include('inc/footer.php'); ?>

