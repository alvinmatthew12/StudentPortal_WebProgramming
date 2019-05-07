<div class="px-4 py-4">
	<h5 class="simple-text text-center"><i class="fas fa-marker"></i> Manage Students Grade</h5>
  <?php
    $result = getUserProfileByUserId($_SESSION['id']);

    if ($result != false) {
      while ($row = $result->fetch_assoc())
      { 
        $id = $row['id'];
        $lecturer_id = $row['lecturer_id'];
        $name = $row['name'];
        $studyprogram = $row['studyprogram'];

   ?>

  <table class="table my-4 pl-4">
    <tr>
        <th>Name</th>
        <td>: <?php echo $name ?></td>
    </tr>
    <tr>
        <th>Lecturer ID</th>
        <td>: <?php echo $lecturer_id ?></td>
    </tr>
    <tr>
        <th>Department</th>
        <td>: <?php echo $studyprogram ?></td>
    </tr>
  </table>

    <?php 
      }
    }
   ?>
	<div class="list-group">
  		<a href="#" class="list-group-item list-group-item-action disabled bg-secondary text-white text-center">PICK COURSE</a>
  		<?php 
  			$result =  getCoursesByLecturerID($_SESSION['id']);
  			if ($result != false) {
  				while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
  					$course_id = $row['course_id'];
  					$course_name = $row['course_name'];
  		?>
  		<a href="<?php echo $baseUrl.'index.php?page=managestudentgrade&id='.$id.''; ?>" class="list-group-item list-group-item-action"><?php echo $course_id ?> <?php echo $course_name ?></a>
  		<?php
  				}
  			}

  		 ?>
	</div>
</div>