<?php 
if (logged_in() ===  TRUE) {
	$userdata = getUserDataByUserId($_SESSION['id']);
	$user_role = $userdata['user_role'];

	if ($user_role != '3')
	{ 
		$link = $linkdomain."/portalmahasiswa/index.php?page=error";
	    // $link = $linkdomain."/index.php?page=error";
	  
	    echo '<script type="text/javascript">
	      	window.location = "'.$link.'"
	    </script>';
	}
	
}
if (logged_in() === FALSE) {
	$link = $linkdomain."/portalmahasiswa/index.php?page=error";
    // $link = $linkdomain."/index.php?page=error";
  
    echo '<script type="text/javascript">
      	window.location = "'.$link.'"
    </script>';
}

 ?>
	<div class="text-center py-4 px-4">
		<h3 class="simple-text py-1">Add Class</h3>

		<p class="mt-4 text-danger">
			
			<?php 
				// form is submitted
				if($_POST) {
					$room_name = $_POST['room_name'];
                	$quota = $_POST['quota'];

			        $alertSuccess = "<div class='alert alert-success'>";
			        $alertFailed = "<div class='alert alert-danger'>";
			        $success = false;

				  	if($room_name == "") {
				    	$alertFailed .= "Room Name is Required <br />";
				  	}

				  	if($quota == "") {
				    	$alertFailed .= "Quota is Required <br />";
				  	}

				  	if($room_name && $quota) {

			  			if (addClass() === TRUE) {
			  				$alertSuccess .= "Successfully Add Class Data. Finished Adding? <a href='".$baseUrl."index.php?page=class&status=successadd' class= 'text-success' > Back </a>";
			  				$success = true;


							// $link = $linkdomain."/index.php?page=semester&status=successadd";
							// var_dump($link); 

							// $link = $linkdomain."/portalmahasiswa/index.php?page=semester&status=successadd";
							// var_dump($link); 
							
							// echo '<script type="text/javascript">
							// 	window.location = "'.$link.'"
							// </script>';

			  			} else{
			  				$alertFailed .= "Add Class Data Failed";
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
		    	<input type="text" class="form-control" name="room_name" placeholder="Enter Room Name">
		  	</div>

		  	<div class="form-group">
		    	<input type="text" class="form-control" name="quota" placeholder="Enter Quota">
		  	</div>
		  	<button type="submit" name="submit" class="btn btn-secondary">Add Now!</button>

		</form>
	</div>





<!-- End of Content -->


