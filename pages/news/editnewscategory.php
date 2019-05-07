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
            	$id = $_GET['id'];

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

		  			if (updateNewsCategory($id) === TRUE) {
		  				$alertSuccess .= "Successfully Update";
		  				$success = true;
		  				$link = $linkdomain."/portalmahasiswa/index.php?page=newscategory&status=successedit";
		  				// $link = $linkdomain."/index.php?page=semester&status=successedit";
					
						echo '<script type="text/javascript">
							window.location = "'.$link.'"
						</script>';
		  			} else{
		  				$alertFailed .= "Update Failed";
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
		<?php 
			$id = $_GET['id'];

			$result = getNewsCategory($id);

			if ($result != false) 
            {
              	while ($row = $result->fetch_assoc()) 
              	{
               		$category_id = $row['category_id'];
                	$category = $row['category'];

		 ?>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
            	<label class="input-group-text" for="inputGroupSelect01">Category ID</label>
        	</div>
        	<input type="text" class="form-control" name="category_id" placeholder="Enter Category ID" value="<?php echo $category_id; ?>">
      	</div>
      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
            	<label class="input-group-text" for="inputGroupSelect01">Category Name</label>
        	</div>
	    	<input type="text" class="form-control" name="category" placeholder="Enter Category" value="<?php echo $category; ?>">
      	</div>

		  	<?php 
		  			}
		  		}
		  	 ?>


	  	<button type="submit" name="submit" class="btn btn-secondary">Update Now!</button>

	</form>
</div>


