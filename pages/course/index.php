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
<div class="px-2 py-2">
	<h3 class="simple-text text-center py-4"><i class="fas fa-clipboard-list"></i> Manage Courses</h3>
	<?php 
	if (isset($_GET['status'])) {
	  if ($_GET['status'] == "successdelete") {
	    echo "<div class='alert alert-success text-center'>Successfully Delete Course</div>";
	  }
	  elseif ($_GET['status'] == "successedit") {
	    echo "<div class='alert alert-success text-center'>Successfully Update Course</div>";
	  }
	}
	?>
	<div class="accordion" id="accordionExample">
		<?php 
			$result = getAllStudyProgram();

			if ($result != false) {
				while ($row = $result->fetch_assoc()) 
	              {
	                $studyprogram_id = $row['studyprogram_id'];
	                $studyprogram_name = $row['studyprogram'];
	                $abbreviation = $row['abbreviation'];

		 ?>
		

		  <div class="card">
		    <div class="card-header" id="headingOne">
		      <h2 class="mb-0">
		        <button class="btn btn-link simple-text" type="button" data-toggle="collapse" data-target="#<?php echo $abbreviation; ?>" aria-expanded="true" aria-controls="collapseOne">
		          <?php echo $studyprogram_name ?>
		        </button>
		      </h2>
		    </div>

		    <div id="<?php echo $abbreviation; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		      
		        <table class="table table-bordered table-responsive-lg text-center">
		        	<thead class="thead-light">
		        		<tr>
		        			<th scope="col">ID</th>
				      		<th scope="col">Course</th>
				      		<th scope="col">Semester</th>
				      		<th scope="col">Lecturer</th>
				      		<th scope="col">Credits</th>
				      		<th scope="col">Tools</th>
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<?php 
					      	$result1 = getCourseByStudyProgram($studyprogram_id);

							if ($result1 != false) {
							while ($row = $result1->fetch_assoc()) 
				              {
				              	$id = $row['id'];
				                $course_id = $row['course_id'];
				                $course = $row['course_name'];
				                $semester_id = $row['semester_id'];
				                $lecturer = $row['name'];
				                $credits = $row['credits'];

					    ?>
		        		<tr>
		        			<td class="align-middle"><?php echo $course_id ?></td>
		        			<td class="align-middle"><?php echo $course ?></td>
		        			<td class="align-middle"><?php echo $semester_id ?></td>
		        			<td class="align-middle"><?php echo $lecturer ?></td>
		        			<td class="align-middle"><?php echo $credits ?></td>
		        			<td style="font-size: 15px;">
            					<a href="<?php echo $baseUrl.'index.php?page=editcourse&id='.$id.''; ?>" class="badge badge-light text-primary badge-12" alt = "Edit">
              						Edit <i class="fas fa-edit"></i>
           						</a>&nbsp;
            					<div class="btn-group dropleft pb-1">
              						<a href class="text-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                						<i class="fas fa-trash-alt"></i> 
              						</a>
              						<div class="dropdown-menu text-alert-cs text-center bg-light">
                						<div class="form-group">
                  							<label>Delete <?php echo $course_id; ?>?</label>
                  							<p>
                    							<a href="<?php echo $baseUrl.'pages/course/delete.php?id='.$id.''; ?>" class="badge badge-danger badge-alert">Delete</a>
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

		        		?>
		        	</tbody>


		        </table>

		        <div class="text-right my-4 mt-4 mr-4">
					<a href="<?php echo $baseUrl.'index.php?page=addcourse&studyprogram='.$studyprogram_id.''; ?>" class="btn btn-secondary">Add Course</a>
				</div>

		      </div>
		    </div>
		


		<?php 
				}
			}
		 ?>
			
	  </div>

</div>