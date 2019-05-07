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

	<h3 class="py-2 simple-text">Edit <?php echo $studyprogram; ?> Schedule</h3>

	<?php 
			}
		}

	 ?>


	<p class="mt-4 text-danger">
	<?php 
	    // form is submitted
	    if($_POST) {
	    	$id_get = $_GET['id'];
			$studyprogram_get = $_GET['studyprogram'];

			$course = $_POST['course'];
			$class = $_POST['class'];
			$time = $_POST['time'];

			$alertSuccess = "<div class='alert alert-success'>";
	        $alertFailed = "<div class='alert alert-danger'>";
	        $success = false;

	      	if($course == "") {
	        	$alertFailed .= "Course is Required <br />";
	      	}

	      	if($class == "") {
	       		$alertFailed .= "Class credits is Required <br />";
	      	}

	      	if($time == "") {
	        	$alertFailed .= "Time semester is Required <br />";
	      	}

	      	if($course && $class && $time) {
      			if (updateSchedule($id_get) === TRUE) {
      				$alertSuccess .= "Successfully Update Student Data";
	              	$success = true;

	              	$link = $linkdomain."/portalmahasiswa/index.php?page=schedule&status=successedit";
	              	// $link = $linkdomain."/index.php?page=schedule&status=successedit";
	          
	            	echo '<script type="text/javascript">
	              		window.location = "'.$link.'"
	            	</script>';
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
		<?php 
			$id_get = $_GET['id'];
            $studyprogram_get = $_GET['studyprogram'];
			$result = getOneScheduleByStudyProgram($id_get);

			if ($result != false) 
          	{
              	while ($row = $result->fetch_assoc()) 
            {
              	$lecturer = $row['name'];
                $schedule_id = $row['schedule_id'];
                $course_id = $row['course_id'];
              	$course_name = $row['course_name'];
                $room_name = $row['room_name'];
                $time_id = $row['time_id'];
                $day = $row['day'];
                $time = $row['time'];




		 ?>
	  	<div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Course</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="course">
        <option selected value="<?php echo $course_id; ?>"><?php echo $course_name; ?> - <?php echo $lecturer; ?></option>
          
                <?php

                	$studyprogram_get = $_GET['studyprogram'];
                  	$result = getCourseByStudyProgram($studyprogram_get);

                  	if ($result != false) 
                  	{
                      	while ($row = $result->fetch_assoc()) 
                    {
                      	$course_id = $row['course_id'];
                      	$course_name = $row['course_name'];
                      	$lecturer = $row['name'];
                  
                ?>

              <option value="<?php echo $course_id; ?>"><?php echo $course_name; ?> - <?php echo $lecturer; ?></option>

              <?php        
                  }
              }
              ?>
          </select>
      </div>
      	<div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Class</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="class">
        	<option selected value="<?php echo $room_name; ?>"><?php echo $room_name ?></option>
          
                <?php
                  $result = getAllClass();

                  if ($result != false) 
                  {
                      while ($row = $result->fetch_assoc()) 
                    {
                      $room_name = $row['room_name'];
                      $quota = $row['quota'];
                  
                ?>

              <option value="<?php echo $room_name; ?>">Class: <?php echo $room_name; ?> - Quota: <?php echo $quota; ?></option>

              <?php        
                  }
              }
              ?>
          </select>
      </div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Time</label>
        	</div>
        	<select class="custom-select" id="inputGroupSelect01" name="time">
        		<option selected value="<?php echo $time_id; ?>"><?php echo $day ?>, <?php echo $time; ?></option>
	          
		          	<?php
		            	$result = getAllTime();

		            	if ($result != false) 
		            	{
		              		while ($row = $result->fetch_assoc()) 
		              	{
		                	$time_id = $row['time_id'];
		                	$day = $row['day'];
		                	$time = $row['time'];
		              
		          	?>

	          	<option value="<?php echo $time_id; ?>"><?php echo $day; ?>, <?php echo $time; ?></option>

		          	<?php        
		              	}
		            }
		          	?>


          	<!-- <option value="31">Information System</option> -->
        	</select>
      	</div>

      	<?php 
      			}
      		}
      	 ?>
      	<button type="submit" name="update" class="btn btn-secondary mt-4">Update Schedule</button>      	


	</form>
</div>