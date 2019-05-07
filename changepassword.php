<?php 

	require './core/base.php';
	require $baseUrl.'/core/init.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<?php require_once './includes/assets.php'; ?>
</head>
<body>

	<div class="login-container bg-light">
			<div class="card mt-5 shadow" style="width: 30rem; ">
			<img class="card-img-top" src="<?php echo $imagePath.'/header.jpg' ?>" alt="Card image cap">
			<div class="card-body text-center">
				<h3 class="card-title simple-text">Change Password</h3>

				
				<p class="mt-4">
				
				<?php

					if($_POST) {
						$currentpassword = $_POST['currentpassword'];
						$newpassword = $_POST['password'];
						$conformpassword = $_POST['conformpassword'];

						$alertSuccess = "<div class='alert alert-success'>";
						$alertFailed = "<div class='alert alert-danger'>";
						$success = false;

						if($currentpassword == "") {
							$alertFailed .= "Current Password field is required <br />";
						}

						if($newpassword == "") {
							$alertFailed .=  "New Password field is required <br />";
						}

						if($conformpassword == "") {
							$alertFailed .=  "Conform Password field is required <br />";
						}

						if($currentpassword && $newpassword && $conformpassword) {
							if(passwordMatch($_SESSION['id'], $currentpassword) === TRUE) {

								if($newpassword != $conformpassword) {
									$alertFailed .=  "New password does not match conform password <br />";
								} else {
									if(changePassword($_SESSION['id'], $newpassword) === TRUE) {
										
						             $alertSuccess .= "Successfully Change Password. <a href='index.php' class= 'text-success' > Back </a>";
						             $success = true;
									} else {
										$alertFailed .=  "Error while updating the information <br />";
									}
								}
								
							} else {
								$alertFailed .=  "Current Password is incorrect <br />";
							}
						}
						if ($success == true)
			            {
			                $alertSuccess .= "</div>";
			                echo $alertSuccess;
			            } else {
			                $alertFailed .= "</div>";
			                echo $alertFailed;
			            }
					}

				?>
				</p>

				<form action="" method="POST">
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="currentpassword" placeholder="Current Password">
				  	</div>
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="password" placeholder="Password">
				  	</div>
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="conformpassword" placeholder="Conform Password">
				  	</div>
				  	<button type="submit" class="btn btn-secondary">Let's Change!</button>
				</form>

			</div>
		</div>
		<!-- Default form login -->

	</div>
</body>
</html>