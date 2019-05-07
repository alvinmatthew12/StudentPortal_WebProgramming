<?php 
if (logged_in() === FALSE) {
	$link = $linkdomain."/portalmahasiswa/login.php";
    // $link = $linkdomain."/login.php";
  
    echo '<script type="text/javascript">
      	window.location = "'.$link.'"
    </script>';
}

$userdata = getUserDataByUserId($_SESSION['id']);
 ?>
<div class="px-2 py-2 text-center">
	<h3 class="simple-text text-center py-4"><i class="fas fa-clipboard-list"></i> My Schedule</h3>
  	<?php 

      	if (isset($_GET['status'])) {
        	if ($_GET['status'] == "successadd") {
          		echo "<div class='alert alert-success text-center'>Successfully Enrol You to Course</div>";
        	}
        	elseif ($_GET['status'] == "successdelete") {
          		echo "<div class='alert alert-success text-center'>Successfully Unenrol From Course</div>";
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
		        <option value="<?php echo $userdata['current_semester']; ?>">Current Semester</option>
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

	        <div class="input-group-prepend">
	          <button class="input-group-text bg-secondary text-white" for="inputGroupSelect01" type="submit">Go</button>
	        </div>

	    </div>
    </form>

 	<table class="table table-bordered table-responsive-lg text-center" style="font-size: 12px;">
    	<thead class="thead-light">
    		<tr>
    			<th scope="col" rowspan="2" class="align-middle">Course ID</th>
    			<th scope="col" rowspan="2" class="align-middle">Credits</th>
	      		<th scope="col" rowspan="2" class="align-middle">Courses</th>
	      		<th scope="col" rowspan="2" class="align-middle">Lecturer</th>
	      		<th scope="col" colspan="3" class="align-middle">Schedule</th>
	      		<th scope="col" rowspan="2" class="align-middle">Tools</th>
	      	</tr>
	      	<tr>	
	      		<th scope="col">Room</th>
	      		<th scope="col">Day</th>
	      		<th scope="col">Time</th>

    		</tr>
    	</thead>
    	<tbody>
    	<?php
    		if (isset($_POST['semester_opt'])) {

    			$semester_opt = $_POST['semester_opt'];
		      	$result = getStudentCousesBySemester($_SESSION['id'],$semester_opt);
				if ($result != false) {
				while ($row = $result->fetch_assoc()) 
	            {
	              	$id = $row['s_id'];
	              	$course_id = $row['course_id'];
	              	$credits = $row['credits'];
	                $schedule_id = $row['schedule_id'];
	                $course = $row['course_name'];
	                $lecturer = $row['name'];
	                $room_name = $row['room_name'];
	                $day = $row['day'];
	                $time = $row['time'];

		    ?>
    		<tr>
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $credits ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $room_name ?></td>
    			<td class="align-middle"><?php echo $day ?></td>
    			<td class="align-middle"><?php echo $time ?></td>
    			<td class="align-middle">
				<div class="btn-group dropleft pb-1">
					<a href class="text-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Unenrol Me <i class="fas fa-sign-out-alt"></i>
					</a>
					<div class="dropdown-menu text-alert-cs text-center bg-light">
					<div class="form-group">
							<label>Can not unenrol from <?php echo $course_id; ?></label>
					</div>

					</div>
				</div>
			</td>
    		</tr>

			<?php
        			}
        		}
        	} else {
        		$result = getStudentCousesBySemester($_SESSION['id'],$userdata['current_semester']);

				if ($result != false) {
					while ($row = $result->fetch_assoc()) 
	            	{
		              	$id = $row['ss_id'];
		              	$course_id = $row['course_id'];
		              	$credits = $row['credits'];
		                $schedule_id = $row['schedule_id'];
		                $course = $row['course_name'];
		                $lecturer = $row['name'];
		                $room_name = $row['room_name'];
		                $day = $row['day'];
		                $time = $row['time'];

		?>

		<tr>
			<td class="align-middle"><?php echo $course_id ?></td>
			<td class="align-middle"><?php echo $credits ?></td>
			<td class="align-middle"><?php echo $course ?></td>
			<td class="align-middle"><?php echo $lecturer ?></td>
			<td class="align-middle"><?php echo $room_name ?></td>
			<td class="align-middle"><?php echo $day ?></td>
			<td class="align-middle"><?php echo $time ?></td>
			<td class="align-middle">
				<div class="btn-group dropleft pb-1">
					<a href class="text-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Unenrol Me <i class="fas fa-sign-out-alt"></i>
					</a>
					<div class="dropdown-menu text-alert-cs text-center bg-light">
					<div class="form-group">
							<label>Unenrol Me From <?php echo $course_id; ?></label>
							<p>
							<a href="<?php echo $baseUrl.'pages/krs/unenrol.php?id='.$id.''; ?>" class="badge badge-danger badge-alert">Unenrol Me</a>
							<a class="badge badge-secondary text-white badge-alert">Cancel</a>
							</p>
					</div>

					</div>
				</div>
			</td>
		</tr>



		<?php
	        		}
	        	}
	        }
    	?>
    	</tbody>
    </table>
</form>


</div>

