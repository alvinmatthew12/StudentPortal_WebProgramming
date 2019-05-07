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
	<h3 class="simple-text text-center py-4"><i class="fas fa-clipboard-list"></i> My Academic Achievement Record</h3>
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
    <?php
		$userdata = getUserDataByUserId($_SESSION['id']);
		$user_role = $userdata['user_role'];

		if ($user_role == '1')
		{ 
		
		$result = getUserProfileByUserId($_SESSION['id']);
		if ($result != false) {
			while ($row = $result->fetch_assoc())
			{	
				$id = $row['id'];
				$student_id = $row['student_id'];
				$name = $row['name'];
				$studyprogram = $row['studyprogram'];
				$semester = $row['current_semester'];

	 ?>

	<table class="table my-4 text-left ml-4">
		<tr>
	  		<th>Name</th>
	  		<td><?php echo $name ?></td>
		</tr>
		<tr>
	  		<th>Studend ID</th>
	  		<td><?php echo $student_id ?></td>
		</tr>
		<tr>
	  		<th>Study Program</th>
	  		<td><?php echo $studyprogram ?></td>
		</tr>
		<tr>
	  		<th>Semester</th>
	  		<td><?php echo $semester ?></td>
		</tr>
	
	<?php 
				}
			}
		}
	?>
 	<table class="table table-bordered table-responsive-lg text-center" style="font-size: 12px;">
    	<thead class="thead-light">
    		<tr>
    			<th scope="col" class="align-middle">Course ID</th>
    			<th scope="col" class="align-middle">Semester</th>
	      		<th scope="col" class="align-middle">Courses</th>
	      		<th scope="col" class="align-middle">Lecturer</th>
	      		<th scope="col" class="align-middle">Credits</th>
	      		<th scope="col" class="align-middle">Mark</th>
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
	              	$semester = $row['semester_id'];
	              	$credits = $row['credits'];
	                $schedule_id = $row['schedule_id'];
	                $course = $row['course_name'];
	                $lecturer = $row['name'];
	                $mark = $row['grade'];

		    ?>

    		<tr>
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $semester ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $credits ?></td>
    			<td class="align-middle"><?php echo $mark ?></td>

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

