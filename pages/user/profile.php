<?php 
if (logged_in() === FALSE) {
	$link = $linkdomain."/portalmahasiswa/login.php";
    // $link = $linkdomain."/login.php";
  
    echo '<script type="text/javascript">
      	window.location = "'.$link.'"
    </script>';
}

 ?>
<div class="px-4 py-4">
	
	<h5 class="simple-text text-center"><i class="fas fa-clipboard-list"></i> Profile</h5>
	<?php 
	if (isset($_GET['status'])) {
	  	if ($_GET['status'] == "successadd") {
	    	echo "<div class='alert alert-success text-center'>Successfully Add Student</div>";
	  	}
	  	elseif ($_GET['status'] == "successdelete") {
	    	echo "<div class='alert alert-success text-center'>Successfully Change Student Status</div>";
	  	}
	  	elseif ($_GET['status'] == "successedit") {
	    	echo "<div class='alert alert-success text-center'>Successfully Edit Profile</div>";
	 	}

	}
	?>
		
	<?php
	if (logged_in() === TRUE) {
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
				$birth_place = $row['birth_place'];
				$birth_date = $row['birth_date'];
				$phone_num = $row['phone_num'];
				$religion = $row['religion'];
				$semester = $row['current_semester'];
				$status = $row['status'];
				$gender = $row['gender'];

	 ?>

	<table class="table my-4">
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
		<tr>
	  		<th>Birth Place</th>
	  		<td><?php echo $birth_place ?></td>
		</tr>
		<tr>
	  		<th>Birthday</th>
	  		<td><?php echo $birth_date ?></td>
		</tr>
		<tr>
	  		<th>Religion</th>
	  		<td><?php echo $religion ?></td>
		</tr>
		<tr>
	  		<th>Gender</th>
	  		<td><?php echo $gender ?></td>
		</tr>
		<tr>
	  		<th>Phone Number</th>
	  		<td><?php echo $phone_num ?></td>
		</tr>
		<tr>
	  		<th>Status</th>
	  		<td>
	  			<?php 
	  				if ($status == '2') {
	  				 	echo "Inactive";
	  				 } else {
	  				 	echo "Active";
	  				 } 
	  			?>	
	  		</td>
		</tr>
	</table>

	<div class="text-center py-4">
		<a href="<?php echo $baseUrl.'index.php?page=edituserprofile&id='.$id.''; ?>" class="btn btn-primary"> Edit</a>
		<a href="<?php echo $baseUrl.'index.php'; ?>" class="btn btn-secondary"> Back</a>	
	</div>
	
	<?php 
				}
			}
		}

		if ($user_role == '2') {

			$result = getUserProfileByUserId($_SESSION['id']);
			if ($result != false) {
			while ($row = $result->fetch_assoc())
			{	
				$id = $row['id'];
				$lecturer_id = $row['lecturer_id'];
				$name = $row['name'];
				$studyprogram = $row['studyprogram'];
				$birth_place = $row['birth_place'];
				$birth_date = $row['birth_date'];
				$phone_num = $row['phone_num'];
				$religion = $row['religion'];
				$status = $row['status'];
				$gender = $row['gender'];
	?>

	<table class="table my-4">
		<tr>
	  		<th>Name</th>
	  		<td><?php echo $name ?></td>
		</tr>
		<tr>
	  		<th>Studend ID</th>
	  		<td><?php echo $lecturer_id ?></td>
		</tr>
		<tr>
	  		<th>Department</th>
	  		<td><?php echo $studyprogram ?></td>
		</tr>
		<tr>
	  		<th>Birth Place</th>
	  		<td><?php echo $birth_place ?></td>
		</tr>
		<tr>
	  		<th>Birthday</th>
	  		<td><?php echo $birth_date ?></td>
		</tr>
		<tr>
	  		<th>Religion</th>
	  		<td><?php echo $religion ?></td>
		</tr>
		<tr>
	  		<th>Gender</th>
	  		<td><?php echo $gender ?></td>
		</tr>
		<tr>
	  		<th>Phone Number</th>
	  		<td><?php echo $phone_num ?></td>
		</tr>
		<tr>
	  		<th>Status</th>
	  		<td>
	  			<?php 
	  				if ($status == '2') {
	  				 	echo "Inactive";
	  				 } else {
	  				 	echo "Active";
	  				 } 
	  			?>	
	  		</td>
		</tr>
	</table>

	<div class="text-center py-4">
		<a href="<?php echo $baseUrl.'index.php?page=edituserprofile&id='.$id.''; ?>" class="btn btn-primary"> Edit</a>
		<a href="<?php echo $baseUrl.'index.php?page=profile'; ?>" class="btn btn-secondary"> Back</a>	
	</div>

	<?php
			
			} if ($user_role == '3') {
				$link = $linkdomain."/portalmahasiswa/404.php";
			    // $link = $linkdomain."/404.php";
			  
			    echo '<script type="text/javascript">
			      	window.location = "'.$link.'"
			    </script>';
			}
		}
	}
}
	 ?>

</div>