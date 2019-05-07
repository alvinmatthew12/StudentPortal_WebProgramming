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
	<h3 class="simple-text py-1">Edit Class</h3>

	<p class="mt-4 text-danger">
		
		<?php 
			// form is submitted
			if($_POST) {
				$room_name = $_POST['room_name'];
                $quota = $_POST['quota'];
            	$id = $_GET['id'];

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

		  			if (updateClass($id) === TRUE) {
		  				$alertSuccess .= "Successfully Update";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=class&status=successedit";
		  				// $link = $linkdomain."/index.php?page=semester&status=successedit";
					
						echo '<script type="text/javascript">
							window.location = "'.$link.'"
						</script>';
		  			} else{
		  				$alertFailed .= "Update Failed";
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
		<?php 
			$id = $_GET['id'];

			$result = getClass($id);

			if ($result != false) 
            {
              	while ($row = $result->fetch_assoc()) 
              	{
               		$room_name = $row['room_name'];
                	$quota = $row['quota'];

		 ?>
		<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Room Name</label>
        	</div>
	    		<input type="text" class="form-control" name="room_name" placeholder="Enter Room Name" value="<?php echo $room_name; ?>">
      	</div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Quota</label>
        	</div>
	    		<input type="text" class="form-control" name="quota" placeholder="Enter Quota" value="<?php echo $quota; ?>">
      	</div>


		  	<?php 
		  			}
		  		}
		  	 ?>


	  	<button type="submit" name="submit" class="btn btn-secondary">Update Now!</button>

	</form>
</div>


