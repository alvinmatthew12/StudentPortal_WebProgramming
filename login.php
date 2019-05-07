<?php 

require './core/base.php';
require './core/config.php';
require './core/auth/auth.php';

if(logged_in() === TRUE) {
	header('location: index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require_once './includes/assets.php'; ?>
</head>
<body>

	<div class="login-container bg-light">
			<div class="card mt-5 shadow" style="width: 30rem; ">
			<img class="card-img-top" src="<?php echo $imagePath.'/header.jpg' ?>" alt="Card image cap">
			<div class="card-body text-center">
				<h3 class="card-title simple-text">SIGN IN</h3>
				
				<p class="mt-4">
				
				<?php
					// form submiited
					if($_POST) {
						$username = $_POST['username'];
						$password = $_POST['password'];

						$alertFailed = "<div class='alert alert-danger'>";
						$error = false;
						
						if($username == "") {
							$alertFailed .= " * Username Field is Required <br />";
						}

						if($password == "") {
							$alertFailed .= " * Password Field is Required <br />";
						}

						if($username && $password) {
							if(userExists($username) == TRUE) {
								$login = login($username, $password);
								if($login) {
									$userdata = userdata($username);

									$_SESSION['id'] = $userdata['id'];

									$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
									
									echo '<script type="text/javascript">
										window.location = "'.$link.'"
									</script>';
									// header('location: index.php' );
									// exit();
										
								} else {
									$alertFailed .= "Incorrect username/password combination";
								}
							} else{
								$alertFailed .= "username does not exists";
							}
						}
						$alertFailed .= "</div>";
						echo $alertFailed;

					}

				?>
				</p>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				  	<div class="form-group">
				    	<input type="username" class="form-control" name="username" placeholder="Username">
				  	</div>
				  	<div class="form-group">
				    	<input type="password" class="form-control" name="password" placeholder="Password">
				  	</div>
				  	<button type="submit" class="btn btn-secondary">Let's Go</button>
				</form>

			</div>
		</div>
		<!-- Default form login -->

	</div>
</body>
</html>