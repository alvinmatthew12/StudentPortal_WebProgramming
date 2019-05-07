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
		<h3 class="simple-text py-1">Add Semester</h3>

		<p class="mt-4 text-danger">
			
			<?php 
				// form is submitted
				if($_POST) {
					$semester_id = $_POST['semester_id'];
                	$semester_name = $_POST['semester_name'];

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

			  			if (addSemester() === TRUE) {
			  				$alertSuccess .= "Successfully Add Semester. Finished Adding? <a href='".$baseUrl."index.php?page=semester&status=successadd' class= 'text-success' > Back </a>";
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
		    	<input type="text" class="form-control" name="semester_id" placeholder="Enter Semester ID">
		  	</div>

		  	<div class="form-group">
		    	<input type="text" class="form-control" name="semester_name" placeholder="Enter Semester Name">
		  	</div>
		  	<button type="submit" name="submit" class="btn btn-secondary">Add Now!</button>

		</form>
	</div>





<!-- End of Content -->


