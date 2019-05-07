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
<div class="px-4 py-4">
	
	<h5 class="simple-text text-center"><i class="fas fa-clipboard-list"></i> Study Program</h5>

	<?php 
	if (isset($_GET['status'])) {
	  if ($_GET['status'] == "successadd") {
	    echo "<div class='alert alert-success text-center'>Successfully Add Study Program</div>";
	  }
	  elseif ($_GET['status'] == "successdelete") {
	    echo "<div class='alert alert-success text-center'>Successfully Delete Study Program</div>";
	  }
	  elseif ($_GET['status'] == "successedit") {
	    echo "<div class='alert alert-success text-center'>Successfully Edit Study Program</div>";
	  }

	}
	?>

	<table class="table table-responsive-lg text-center">
	  	<thead class="thead-light">
	    	<tr>
	      		<th scope="col">#</th>
	      		<th scope="col">Study Program ID</th>
	      		<th scope="col">Study Program</th>
	      		<th scope="col">Abbreviation</th>
	      		<th scope="col">Tools</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	    	
    		<?php 
    			$result = getAllStudyProgram();

    			if ($result != false) {
    				while ($row = $result->fetch_assoc())
    				{	
    					$id = $row['id'];
    					$studyprogram_id = $row['studyprogram_id'];
        				$studyprogram_name = $row['studyprogram'];
        				$abbreviation = $row['abbreviation'];

        	 ?>
        	 <tr>
	      		<td><?php echo $id; ?></td>
	      		<td><?php echo $studyprogram_id; ?></td>
	      		<td><?php echo $studyprogram_name; ?></td>
	      		<td class="text-uppercase"><?php echo $abbreviation; ?></td>
	      		<td style="font-size: 15px;">
					<a href="<?php echo $baseUrl.'index.php?page=editstudpro&id='.$id.''; ?>" class="badge badge-light text-primary badge-12" alt = "Edit">
  						Edit <i class="fas fa-edit"></i>
						</a>&nbsp;
					<div class="btn-group dropup pb-1">
  						<a href class="text-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    						<i class="fas fa-trash-alt"></i> 
  						</a>
  						<div class="dropdown-menu text-alert-cs text-center bg-light">
    						<div class="form-group">
      							<label>Delete <?php echo $studyprogram_name; ?>?</label>
      							<p>
        							<a href="<?php echo $baseUrl.'pages/studyprogram/delete.php?id='.$id.''; ?>" class="badge badge-danger badge-alert">Delete</a>
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

	<div class="text-right my-4">
		<a href="<?php echo $baseUrl.'index.php?page=addstudpro'; ?>" class="btn btn-secondary">Add Study Program</a>
	</div>


</div>