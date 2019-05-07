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
<div class="text-center py-4 px-4">
	<h3 class="simple-text py-1">Edit News Category</h3>

	<p class="mt-4 text-danger">
		
		<?php 
			// form is submitted
			if($_POST) {
				$category_id = $_POST['category_id'];
            	$category = $_POST['category'];

		        $alertSuccess = "<div class='alert alert-success'>";
		        $alertFailed = "<div class='alert alert-danger'>";
		        $success = false;

			  	if($category_id == "") {
			    	$alertFailed .= "Category is Required <br />";
			  	}

			  	if($category == "") {
			    	$alertFailed .= "Category is Required <br />";
			  	}

			  	if($category_id && $category) {

		  			if (addNewsCategory() === TRUE) {
		  				$alertSuccess .= "Successfully Add";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=newscategory&status=successadd";
		  				// $link = $linkdomain."/index.php?page=newscategory&status=successedit";
					
						echo '<script type="text/javascript">
							window.location = "'.$link.'"
						</script>';
		  			} else{
		  				$alertFailed .= "Add News Category Failed";
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
	</p>

	<form action="" method="POST">

	  	<div class="form-group">
	    	<input type="text" class="form-control" name="category_id" placeholder="Enter Category ID">
	  	</div>

	  	<div class="form-group">
	    	<input type="text" class="form-control" name="category" placeholder="Enter Category">
	  	</div>


	  	<button type="submit" name="submit" class="btn btn-secondary">Add Now!</button>

	</form>
</div>


