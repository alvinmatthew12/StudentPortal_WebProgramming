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

		  			if (addStudyProgram() === TRUE) {
		  				$alertSuccess .= "Successfully Add Study Program. Finished Adding? <a href='".$baseUrl."index.php?page=studyprogram&status=successadd' class= 'text-success' > Back </a>";
		  				$success = true;

						// $link = $linkdomain."/index.php?page=semester&status=successadd";
						// var_dump($link); 

						// $link = $linkdomain."/portalmahasiswa/index.php?page=semester&status=successadd";
						// var_dump($link); 
						
						// echo '<script type="text/javascript">
						// 	window.location = "'.$link.'"
						// </script>';
						
		  			} else{
		  				$alertFailed .= "Add Study Program Failed";
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
	    	<input type="text" class="form-control" name="studyprogram_id" placeholder="Enter Study Program ID">
	  	</div>

	  	<div class="form-group">
	    	<input type="text" class="form-control" name="studyprogram_name" placeholder="Enter Study Program">
	  	</div>

	  	<div class="form-group">
	    	<input type="text" class="form-control" name="abbr" placeholder="Enter Study Program Abbreviation">
	  	</div>
	  	<button type="submit" name="submit" class="btn btn-secondary">Add Now!</button>

	</form>
</div>

