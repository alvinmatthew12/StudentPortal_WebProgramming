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
	<?php 
		$studyprogram_get = $_GET['studyprogram'];
		$result = getStudyProgramName($studyprogram_get);

      	if ($result != false) 
      	{
          	while ($row = $result->fetch_assoc()) 
        {
          	$studyprogram = $row['studyprogram'];

	 ?>

	<h3 class="py-2 simple-text">Add <?php echo $studyprogram; ?> Course</h3>

	<?php 
			}
		}

	 ?>


	<p class="mt-4 text-danger">
	<?php 
	    // form is submitted
	    if($_POST) {

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

      			if (addCourseByStudyProgram($studyprogram_get) === TRUE) {
      				$alertSuccess .= "Successfully Add Course. Finished Adding? <a href='".$baseUrl."index.php?page=managecourse&status=successadd' class= 'text-success' > Back </a>";
			  		$success = true;
      			} else{
      				$alertFailed .= "Add Course Failed";
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
		<div class="input-group mb-3">
          	<div class="input-group-prepend">
             	<label class="input-group-text" for="inputGroupSelect01">Course ID</label>
          	</div>
	    	<input type="text" class="form-control" name="course_id" placeholder="Enter Course ID...">
	  	</div>
	  	<div class="input-group mb-3">
          	<div class="input-group-prepend">
             	<label class="input-group-text" for="inputGroupSelect01">Course Name</label>
          	</div>
          	<input type="text" class="form-control" name="course_name" placeholder="Enter Course Name...">
	  	</div>
	  	<div class="input-group mb-3">
          	<div class="input-group-prepend">
             	<label class="input-group-text" for="inputGroupSelect01">Credits</label>
          	</div>
	    	<input type="text" class="form-control" name="course_credits" placeholder="Enter Course Credits...">
	  	</div>
      	<div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Semester</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="course_semester">
        <option selected>Choose...</option>
          
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
				<option selected>Choose...</option>
          
		          	<?php
		            	$result = getAllLecturerByStudyProgram($studyprogram_get);

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

      	<button type="submit" name="register" class="btn btn-secondary mt-4">Add Course</button>      	


	</form>
</div>