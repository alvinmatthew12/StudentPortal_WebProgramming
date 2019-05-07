
<!-- header -->
<nav class="bg-light navbar-light shadow">

  	<div class="container-fluid">
  		
  		<div class="row">

			<div class="col-sm-4 ml-4">
				<a href="index.php">
					<img src="<?php echo $imagePath.'/logo.png' ?>" class="img-fluid ml-4" width="40%">		
				</a>
			</div>

			<div class="col-sm-7 ml-4">
				<ul class="nav justify-content-end my-3 ml-4">

					<?php if (logged_in() === FALSE) { ?>

					<li class="nav-item">
						<a class="nav-link simple-text" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>
					</li>

					<?php } else { ?>

					<li>
						<a class="nav-link text-uppercase text-secondary dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php
								$userdata = getUserDataByUserId($_SESSION['id']);
								echo $userdata['name'];
							?> 
							 <i class="fas fa-user"></i>
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="<?php echo $baseUrl.'index.php?page=userprofile'; ?>"><i class="fas fa-user-alt"></i> Profile</a>
						   	<a class="dropdown-item" href="<?php echo $baseUrl.'changepassword.php'; ?>"><i class="fas fa-key"></i> Change Password</a>
							<a class="dropdown-item" href="<?php echo $baseUrl.'logout.php'; ?>"><i class="fas fa-power-off"></i> Logout</a>
						</div>
					</li>

					<?php } ?>

				</ul> 
			</div>

  		</div>
  		
  	</div>

</nav>

<!-- end header -->