<div class="px-2 py-2">
	<h3 class="simple-text text-center py-4"><i class="fas fa-clipboard-list"></i> Courses</h3>
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
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<?php 
					      	$result1 = getCourseByStudyProgram($studyprogram_id);

							if ($result1 != false) {
							while ($row = $result1->fetch_assoc()) 
				              {
				                $course_id = $row['course_id'];
				                $course = $row['course_name'];
				                $semester_id = $row['semester_id'];
				                $lecturer = $row['name'];
				                $credits = $row['credits'];

					    ?>
		        		<tr>
		        			<td><?php echo $course_id ?></td>
		        			<td><?php echo $course ?></td>
		        			<td><?php echo $semester_id ?></td>
		        			<td><?php echo $lecturer ?></td>
		        			<td><?php echo $credits ?></td>
		        		</tr>
		        		<?php
		        			}
		        		}

		        		?>
		        	</tbody>


		        </table>
		      </div>
		    </div>
		


		<?php 
				}
			}
		 ?>
			

	  </div>

</div>