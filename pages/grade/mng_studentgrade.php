<div class="px-4 py-4">
	<h5 class="simple-text text-center"><i class="fas fa-marker"></i> Manage Students Grade</h5>
		<?php 
	    // form is submitted
	    if($_POST) {
			ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	    	$mark = $_POST['mark'];
	    	$student_id = $_POST['student_id'];

			$alertSuccess = "<div class='alert alert-success text-center'>";
	        $alertFailed = "<div class='alert alert-danger text-center'>";
	        $success = false;

	      	if($mark == "") {
	        	$alertFailed .= "Mark is left unselected <br />";
	      	}

	      	if($mark) {

      			if (insertStudentMark() === TRUE) {
      				$alertSuccess .= "Successfully Manage Student Mark";
			  		$success = true;
      			} else{
      				$alertFailed .= "Insert Student Mark Failed";
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
		<?php 
  			$result =  getCourse($_GET['id']);
  			if ($result != false) {
  				while ($row = $result->fetch_assoc()) {
  					$course_id = $row['course_id'];
  					$course_name = $row['course_name'];
  		?>
		<p class="simple-text ml-2">
			<a href="<?php echo $baseUrl.'index.php?page=managegrade'; ?>" class="text-secondary">
				<i class="fas fa-arrow-circle-left"></i>
			</a>
			<?php echo $course_id ?> <?php echo $course_name ?>
		</p>
		<?php
  				}
  			}

  		 ?>
  	<h6 class="text-right text-primary badge-12 mr-2">Click Mark to Edit</h6>
	<table class="table table-responsive-lg text-center table-bordered">
		<thead class="thead-light">
			<tr>
				<th scope="col">Student ID</th>
				<th scope="col">Student Name</th>
				<th scope="col">Student Semester</th>
				<th scope="col">Mark</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$result = getStudentByCourseID($_GET['id']);
				if ($result != false) {
  				while ($row = $result->fetch_assoc()) {
  					$schedule_id = $row['schedule_id'];
  					$student_id = $row['student_id'];
  					$student_name = $row['name'];
  					$current_semester = $row['current_semester'];
  					$grade = $row['grade'];

			 ?>
			<tr>
				<td><?php echo $student_id; ?></td>
				<td><?php echo $student_name; ?></td>
				<td><?php echo $current_semester; ?></td>
				<td>
					<?php 
						if ($grade != null) {
					 ?>
					<div class="btn-group dropup pb-1">
  						<a href class="badge badge-primary badge-15" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    						<?php echo $grade; ?>
  						</a>
  						<div class="dropdown-menu text-alert-cs text-center bg-light">
    						<div class="form-group">
    							<form action="" method="POST">
	      							<label>Edit <?php echo $student_id; ?> Grade</label>
	      							<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
	      							<input type="hidden" name="schedule_id" value="<?php echo $schedule_id; ?>">
	      							<select class="custom-select selectpicker" id="inputGroupSelect01" name="mark" style="width: 40%;">

	      								<?php 
	      									$result1 = getAllMark();
	      									if ($result1 != false) {
	  											while ($row = $result1->fetch_assoc()) {
	  												$mark = $row['mark'];
	      								 ?>
	      								<option value="<?php echo $mark ?>"><?php echo $mark ?></option>
	      								<?php 
	      									}
	      								}
	      								 ?>
							        </select>
	 							</div>
	 							<button type="submit" class="badge badge-primary badge-15 text-white badge-alert">Update</button>
	 						</form>
						</div>
						<script>
						$('.dropdown-menu').on('click', function(event) {
						    event.stopPropagation();
						});

						$('.selectpicker').selectpicker({
						    container: 'body'
						});

						$('body').on('click', function(event) {
						    var target = $(event.target);
						    if (target.parents('.bootstrap-select').length) {
						        event.stopPropagation();
						        $('.bootstrap-select.open').removeClass('open');
						    }
						}); 
					</script>
					<?php
						} else {
					 ?>

					<div class="btn-group dropup pb-1">
  						<a href class="badge badge-12 badge-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    						Input <i class="fas fa-edit"></i>
  						</a>
  						<div class="dropdown-menu text-alert-cs text-center bg-light">
  							<form action="" method="POST">
        						<div class="form-group">
          							<label>Input <?php echo $student_id; ?> Grade</label>
      								<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
      								<input type="hidden" name="schedule_id" value="<?php echo $schedule_id; ?>">
          							<select class="custom-select selectpicker" id="inputGroupSelect01" name="mark" style="width: 40%;">

          								<?php 
          									$result1 = getAllMark();
          									if ($result1 != false) {
	  											while ($row = $result1->fetch_assoc()) {
	  												$mark = $row['mark'];
          								 ?>
          								<option value="<?php echo $mark ?>"><?php echo $mark ?></option>
          								<?php 
          									}
          								}
          								 ?>
							        </select>
     							</div>
     							<button type="submit" class="badge badge-primary badge-15 text-white badge-alert">Insert</button>
        						</div>
    						</form>
 						</div>
					</div>

					<script>
						$('.dropdown-menu').on('click', function(event) {
						    event.stopPropagation();
						});

						$('.selectpicker').selectpicker({
						    container: 'body'
						});

						$('body').on('click', function(event) {
						    var target = $(event.target);
						    if (target.parents('.bootstrap-select').length) {
						        event.stopPropagation();
						        $('.bootstrap-select.open').removeClass('open');
						    }
						}); 
					</script>

					<?php		
						}

					 ?>
				</td>
			</tr>
			<?php 
					}
				}
			 ?>
		</tbody>
	</table>
</div>