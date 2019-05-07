<?php 
if (logged_in() === FALSE) {
	$link = $linkdomain."/portalmahasiswa/login.php";
    // $link = $linkdomain."/login.php";
  
    echo '<script type="text/javascript">
      	window.location = "'.$link.'"
    </script>';
}

 ?>
<div class="px-2 py-2 text-center">
	<h3 class="simple-text text-center py-4"><i class="fas fa-clipboard-list"></i> Form of Study Plan</h3>

	<?php 
	ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	    // form is submitted
	    if($_POST['schedule_id']) {
	    	

	    	$schedule_id = $_POST['schedule_id'];

			$alertSuccess = "<div class='alert alert-success'>";
	        $alertFailed = "<div class='alert alert-danger'>";
	        $success = false;

	      	if(empty($schedule_id)) {
	        	$alertFailed .= "Course Was Left Unchecked <br />";
	      	}

	      	if($schedule_id) {
      			if (addStudentCourses($_SESSION['id']) === TRUE) {
      				$alertSuccess .= "Successfully Add Courses";
			  		$success = true;

			  		$link = $linkdomain."/portalmahasiswa/index.php?page=myschedule&status=successadd";
	  				// $link = $linkdomain."/index.php?page=myschedule&status=successadd";

					echo '<script type="text/javascript">
						window.location = "'.$link.'"
					</script>';
      			} else{
      				$alertFailed .= "Add Courses Failed";
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
<form action="" method="POST">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Semester</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="semester_opt">
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
			<option value="all">All</option>
        </select>

        <div class="input-group-prepend">
          <button class="input-group-text bg-secondary text-white" for="inputGroupSelect01" type="submit">Go</button>
        </div>

    </div>
</form>
<form action="" method="POST">

 	<table class="table table-bordered table-responsive-lg text-center" style="font-size: 12px;">
    	<thead class="thead-light">
    		<tr>
    			<th scope="col" rowspan="2" class="align-middle">#</th>
    			<th scope="col" rowspan="2" class="align-middle">Course ID</th>
    			<th scope="col" rowspan="2" class="align-middle">Semester</th>
	      		<th scope="col" rowspan="2" class="align-middle">Courses</th>
	      		<th scope="col" rowspan="2" class="align-middle">Lecturer</th>
	      		<th scope="col" colspan="2" class="align-middle">Schedule</th>
	      	</tr>
	      	<tr>	
	      		<th scope="col">Room</th>
	      		<th scope="col">Day & Time</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php 
    		if (isset($_POST['semester_opt'])) {
    			if ($_POST['semester_opt'] !== 'all') {

	    			$semester_opt = $_POST['semester_opt'];
	    			$userdata = getUserDataByUserId($_SESSION['id']);
	    			$studyprogram_id = $userdata['studyprogram_id'];
			      	$result = getKrsByStudyProgramAndSemester($studyprogram_id, $semester_opt);

					if ($result != false) {
					while ($row = $result->fetch_assoc()) 
		              {
		              	$id = $row['s_id'];
		              	$course_id = $row['course_id'];
		              	$semester = $row['semester_id'];
		                $schedule_id = $row['schedule_id'];
		                $course = $row['course_name'];
		                $lecturer = $row['name'];
		                $room_name = $row['room_name'];
		                $day = $row['day'];
		                $time = $row['time'];

		    ?>
    		<tr>
    			<td class="align-middle"><input class="px-2" type="checkbox" value="<?php echo $schedule_id ?>" id="defaultCheck1" name="schedule_id[]"></td>
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $semester ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $room_name ?></td>
    			<td class="align-middle"><?php echo $day ?>, <?php echo $time ?></td>
    		</tr>

		<?php
    			}
    		}
    	}

    		if ($_POST['semester_opt'] == 'all') {

			$userdata = getUserDataByUserId($_SESSION['id']);
			$studyprogram_id = $userdata['studyprogram_id'];
	      	$result = getKrsByStudyProgram($studyprogram_id);

			if ($result != false) {
			while ($row = $result->fetch_assoc()) 
              {
              	$id = $row['s_id'];
              	$course_id = $row['course_id'];
              	$semester = $row['semester_id'];
                $schedule_id = $row['schedule_id'];
                $course = $row['course_name'];
                $lecturer = $row['name'];
                $room_name = $row['room_name'];
                $day = $row['day'];
                $time = $row['time'];

		    ?>
    		<tr>
    			<td class="align-middle"><input class="px-2" type="checkbox" value="<?php echo $schedule_id ?>" id="defaultCheck1" name="schedule_id[]"></td>
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $semester ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $room_name ?></td>
    			<td class="align-middle"><?php echo $day ?>, <?php echo $time ?></td>
    		</tr>

		<?php
    			}
    		}
    	}
    }
    	
    	else {
    		$userdata = getUserDataByUserId($_SESSION['id']);
			$studyprogram_id = $userdata['studyprogram_id'];
	      	$result = getKrsByStudyProgram($studyprogram_id);

			if ($result != false) {
			while ($row = $result->fetch_assoc()) 
              {
              	$id = $row['s_id'];
              	$course_id = $row['course_id'];
              	$semester = $row['semester_id'];
                $schedule_id = $row['schedule_id'];
                $course = $row['course_name'];
                $lecturer = $row['name'];
                $room_name = $row['room_name'];
                $day = $row['day'];
                $time = $row['time'];

		    ?>
    		<tr>
    			<td class="align-middle"><input class="px-2" type="checkbox" value="<?php echo $schedule_id ?>" id="defaultCheck1" name="schedule_id[]"></td>
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $semester ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $room_name ?></td>
    			<td class="align-middle"><?php echo $day ?>, <?php echo $time ?></td>
    		</tr>

		<?php
    			}
    		}
    	}

		?>
    	</tbody>
    </table>

	<div class="text-center my-4 mt-2 mr-4">
  		<button type="submit" name="addcourse" class="btn btn-secondary">Add Courses</button>   
	</div>
</form>

</div>