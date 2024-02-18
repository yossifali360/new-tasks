<?php require_once("../../app/config.php"); ?>
<?php require_once("../../app/db.php"); ?>
<?php require_once(MAIN_PATH . "views/front/inc/header.php"); ?>
<?php
$sql = "SELECT  *  FROM `articles`";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<link href="<?php echo URL . "public/" ?>css/styles.css" rel="stylesheet" />

</head>

<body>
	<section class="h-100 gradient-form">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="row g-0">
							<div class="col-lg-6">
								<div class="card-body p-md-5 mx-md-4">
									<form method="POST" action="<?= URL . "controllers/dashboard/auth/login.php" ?>">
										<p class="text-center">Login to your account</p>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example11">Username</label>
											<input type="text" name="username" id="form2Example11" class="form-control" placeholder="Phone number or email address" />
										</div>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example22">Password</label>
											<input type="password" name="password" id="form2Example22" class="form-control" placeholder="Enter Your Password" />
										</div>

										<div class="pt-1 pb-1">
											<input class="btn btn-primary rounded-3 mb-3" type="submit" value="Login" />
										</div>
										<a class="text-muted" href="#!">Forgot password?</a>
									</form>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
								<div class="text-white px-3 py-4 p-md-5 mx-md-4">
									<h4 class="mb-4">
										We are more than just a company
									</h4>
									<p class="small mb-0">
										Lorem ipsum dolor sit amet,
										consectetur adipisicing elit, sed do
										eiusmod tempor incididunt ut labore
										et dolore magna aliqua. Ut enim ad
										minim veniam, quis nostrud
										exercitation ullamco laboris nisi ut
										aliquip ex ea commodo consequat.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>