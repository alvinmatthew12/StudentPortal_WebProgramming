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
	<h3 class="py-2 simple-text">Edit Courses</h3>


	<p class="mt-4 text-danger">
	<?php 
	    // form is submitted
	    if($_POST) {
	    	$id = $_GET['id'];
	    	$course_id = $_POST['course_id']; 
			$course_name = $_POST['course_name'];
			$course_credits = $_POST['course_credits'];
			$course_semester = $_POST['course_semester'];
			$lecturer = $_POST['lecturer'];

			$alertSuccess = "<div class='alert alert-success'>";
	        $alertFailed = "<div class='alert alert-danger'>";
	        $success = false;

	      	if($course_id == "") {
	        	$alertFailed .= " * Course ID is Required <br />";
	      	}

	      	if($course_name == "") {
	        	$alertFailed .= " * Course name is Required <br />";
	      	}

	      	if($course_credits == "") {
	       		$alertFailed .= " * Course credits is Required <br />";
	      	}

	      	if($course_semester == "") {
	        	$alertFailed .= " * Course semester is Required <br />";
	      	}

	      	if($lecturer == "") {
	        	$alertFailed .= " * Lecturer is Required <br />";
	      	}

	      	if($course_id && $course_name && $course_credits && $course_semester && $lecturer) {

      			if (updateCourse($id) === TRUE) {
      				$alertSuccess .= "Successfully Update";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=managecourse&status=successedit";
		  				// $link = $linkdomain."/index.php?page=managecourse&status=successedit";
					
						echo '<script type="text/javascript">
							window.location = "'.$link.'"
						</script>';
      			} else{
      				$alertFailed .= "Update Course Failed";
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
			$result = getCourse($id);

	      if ($result != false) {
	        while ($row = $result->fetch_assoc()) {
	        	$course_id = $row['course_id'];
	            $course = $row['course_name'];
	            $semester = $row['semester_id'];
	            $lecturer_id = $row['lecturer_id'];
	            $lecturer_name = $row['name'];
		        $credits = $row['credits'];

		 ?>
		<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Course ID</label>
        	</div>
	    		<input type="text" class="form-control" name="course_id" placeholder="Enter Course ID..." value="<?php echo $course_id ?>">
      	</div>
		<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Course Name</label>
        	</div>
	    		<input type="text" class="form-control" name="course_name" placeholder="Enter Course Name..." value="<?php echo $course ?>">
      	</div>
	  	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Credits</label>
        	</div>
	    		<input type="text" class="form-control" name="course_credits" placeholder="Enter Course Credits..." value="<?php echo $credits ?>">
      	</div>
	  	
      <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Semester</label>
          </div>
         <select class="custom-select" id="inputGroupSelect01" name="course_semester">
        <option selected value="<?php echo $semester; ?>"><?php echo $semester ?></option>
          
                <?php
                  $result = getAllSemester();

                  if ($result != false) 
                  {
                      while ($row = $result->fetch_assoc()) 
                    {
                      $semester_id = $row['semester_id'];
                      $semester_name = $row['semester_name'];
                  
                ?>

              <option value="<?php echo $semester_id; ?>"><?php echo $semester_name; ?></option>

              <?php        
                  }
              }
              ?>
          </select>
      </div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Lecturer</label>
        	</div>
        	<select class="custom-select" id="inputGroupSelect01" name="lecturer">
				<option selected value="<?php echo $lecturer_id; ?>"><?php echo $lecturer_id; ?> - <?php echo $lecturer_name; ?></option>
          
		          	<?php
		            	$result = getAllLecturerData();

		            	if ($result != false) 
		            	{
		              		while ($row = $result->fetch_assoc()) 
		              	{
		                	$lecturer_id = $row['lecturer_id'];
		                	$lecturer_name = $row['name'];
		              
		          	?>

          		<option value="<?php echo $lecturer_id; ?>"><?php echo $lecturer_id; ?> - <?php echo $lecturer_name; ?></option>

			      	<?php        
			          	}
			        }
			      	?>
        	</select>
      	</div>

      	<?php 
	      		}
	      	}

      	 ?>

      	<button type="submit" name="register" class="btn btn-secondary mt-4">Update Course</button>      	


	</form>
</div>