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

 	<table class="table table-bordered table-responsive-lg text-center" style="font-size: 12px;">
    	<thead class="thead-light">
    		<tr>
    			<th scope="col" rowspan="2" class="align-middle">Course ID</th>
    			<th scope="col" rowspan="2" class="align-middle">Semester</th>
	      		<th scope="col" rowspan="2" class="align-middle">Courses</th>
	      		<th scope="col" rowspan="2" class="align-middle">Lecturer</th>
	      		<th scope="col" colspan="3" class="align-middle">Schedule</th>
	      	</tr>
	      	<tr>	
	      		<th scope="col">Room</th>
	      		<th scope="col">Day</th>
	      		<th scope="col">Time</th>

    		</tr>
    	</thead>
    	<tbody>
    	<?php
	      	$result = getLecturerSchedule($_SESSION['id']);
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
    			<td class="align-middle"><?php echo $course_id ?></td>
    			<td class="align-middle"><?php echo $semester ?></td>
    			<td class="align-middle"><?php echo $course ?></td>
    			<td class="align-middle"><?php echo $lecturer ?></td>
    			<td class="align-middle"><?php echo $room_name ?></td>
    			<td class="align-middle"><?php echo $day ?></td>
    			<td class="align-middle"><?php echo $time ?></td>
    		</tr>

			<?php
    			}
    		}
		?>
    	</tbody>
    </table>
</form>

<!-- Modal -->
<div class="modal fade" id="unenrolModal" role="dialog">
   	<div class="modal-dialog modal-dialog-centered">
    
    <!-- Modal content-->
	    <div class="modal-content">
	        <div class="modal-header">
	          	<h4 class="modal-title">Unenrol Me</h4>
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	       	</div>
	        <div class="modal-body">
	          	<p> Are you sure you want to unenrol from <?php echo $course_id; ?> <?php echo $course; ?></p>
	        </div>
	        <div class="modal-footer">
	        	<a id="confirmButton" href="" class="btn btn-primary">Ok</a>
	          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        </div>
	    </div>
  	</div>
</div>
</div>
<script>
$('#unenrolButton').click(function(){
    var ID = $(this).data('id');
    $('#confirmButton').data('id', ID); //set the data attribute on the modal button
});

$('#confirmButton').click(function(){
    var ID = $(this).data('id');
    $.ajax({
        url: "<?php echo $baseUrl.'pages/krs/delete.php?id='?>" + ID
    });
});
</script>