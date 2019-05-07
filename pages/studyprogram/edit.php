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
	<h3 class="simple-text py-1">Edit Study Program</h3>

	<p class="mt-4 text-danger">
		
		<?php 
			// form is submitted
			if($_POST) {
				$studyprogram_id = $_POST['studyprogram_id'];
            	$studyprogram_name = $_POST['studyprogram_name'];
            	$abbr = $_POST['abbr'];
            	$id = $_GET['id'];

		        $alertSuccess = "<div class='alert alert-success'>";
		        $alertFailed = "<div class='alert alert-danger'>";
		        $success = false;

			  	if($studyprogram_id == "") {
			    	$alertFailed .= "Study Program ID is Required <br />";
			  	}

			  	if($studyprogram_name == "") {
			    	$alertFailed .= "Study Program is Required <br />";
			  	}

			  	if($abbr == "") {
			   		$alertFailed .= "Study Program Abbreviation is Required <br />";
			  	}

			  	if($studyprogram_id && $studyprogram_name && $abbr) {

		  			if (updateStudyProgram($id) === TRUE) {
		  				$alertSuccess .= "Successfully Update";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=studyprogram&status=successedit";
		  				// $link = $linkdomain."/index.php?page=studyprogram&status=successedit";

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

			$result = getStudyProgram($id);

			if ($result != false) 
            {
              	while ($row = $result->fetch_assoc()) 
              	{
               		$studyprogram_id = $row['studyprogram_id'];
                	$studyprogram_name = $row['studyprogram'];
                	$abbr = $row['abbreviation'];

		 ?>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Study Program ID</label>
        	</div>
	    		<input type="text" class="form-control" name="studyprogram_id" placeholder="Enter Study Program ID" value="<?php echo $studyprogram_id; ?>">
      	</div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Study Program Name</label>
        	</div>
	    		<input type="text" class="form-control" name="studyprogram_name" placeholder="Enter Study Program" value="<?php echo $studyprogram_name; ?>">
      	</div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Study Program Abbreviation</label>
        	</div>
	    		<input type="text" class="form-control" name="abbr" placeholder="Enter Study Program Abbreviation" value="<?php echo $abbr; ?>">
      	</div>


		  	<?php 
		  			}
		  		}
		  	 ?>


	  	<button type="submit" name="submit" class="btn btn-secondary">Update Now!</button>

	</form>
</div>
