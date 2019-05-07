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
	<h3 class="simple-text py-1">Edit Semester</h3>

	<p class="mt-4 text-danger">
		
		<?php 
			// form is submitted
			if($_POST) {
				$semester_id = $_POST['semester_id'];
            	$semester_name = $_POST['semester_name'];
            	$id = $_GET['id'];

		        $alertSuccess = "<div class='alert alert-success'>";
		        $alertFailed = "<div class='alert alert-danger'>";
		        $success = false;

			  	if($semester_id == "") {
			    	$alertFailed .= "Semester ID is Required <br />";
			  	}

			  	if($semester_name == "") {
			    	$alertFailed .= "Semester is Required <br />";
			  	}

			  	if($semester_id && $semester_name) {

		  			if (updateSemester($id) === TRUE) {
		  				$alertSuccess .= "Successfully Update";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=semester&status=successedit";
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

			$result = getsemester($id);

			if ($result != false) 
            {
              	while ($row = $result->fetch_assoc()) 
              	{
               		$semester_id = $row['semester_id'];
                	$semester_name = $row['semester_name'];

		 ?>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
            	<label class="input-group-text" for="inputGroupSelect01">Semester ID</label>
        	</div>
        	<input type="text" class="form-control" name="semester_id" placeholder="Enter Semester ID" value="<?php echo $semester_id; ?>">
      	</div>
      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
            	<label class="input-group-text" for="inputGroupSelect01">Semester Name</label>
        	</div>
        	<input type="text" class="form-control" name="semester_name" placeholder="Enter Semester" value="<?php echo $semester_name; ?>">
      	</div>

		  	<?php 
		  			}
		  		}
		  	 ?>


	  	<button type="submit" name="submit" class="btn btn-secondary">Update Now!</button>

	</form>
</div>


