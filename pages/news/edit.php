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
<div class="text-center pb-4 px-4">
	<h3 class="simple-text pb-1"><i class="fas fa-bullhorn"></i> Edit News</h3>

	<p class="mt-4 text-danger">
		
		<?php 
			$id = $_GET['id'];

			// form is submitted
			if($_POST) {

				$title = $_POST['title'];
				$content = $_POST['content'];
				$category = $_POST['category'];

		        $alertSuccess = "<div class='alert alert-success'>";
		        $alertFailed = "<div class='alert alert-danger'>";
		        $success = false;

			  	if($title == "") {
			    	$alertFailed .= "News Title is Required <br />";
			  	}

			  	if($category == "") {
			    	$alertFailed .= "News Category is Required <br />";
			  	}

			  	if($content == "") {
			   		$alertFailed .= "News content is Required <br />";
			  	}

			  	if($title && $content) {

		  			if (updateNews($id) === TRUE) {
		  				$alertSuccess .= "Successfully Update News";
		  				$success = true;

		  				$link = $linkdomain."/portalmahasiswa/index.php?page=news&status=successedit";
		  				// $link = $linkdomain."/index.php?page=news&status=successedit";
					
						echo '<script type="text/javascript">
							window.location = "'.$link.'"
						</script>';

		  			} else{
		  				$alertFailed .= "Update News Failed";
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
			
			$result = getNewsData($id);

			if ($result != false) {
				while ($row = $result->fetch_assoc()) {
					$title_slc = $row['title'];
					$content_slc = $row['content'];
					$category_id_slc = $row['category_id'];
					$category_slc = $row['category'];

		?>


      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
            	<label class="input-group-text" for="inputGroupSelect01">Title</label>
        	</div>
        	<input type="text" class="form-control" name="title" placeholder="Enter News Title" value="<?php echo $title_slc; ?>">
      	</div>

      	<div class="input-group mb-3">
        	<div class="input-group-prepend">
          		<label class="input-group-text" for="inputGroupSelect01">Category</label>
        	</div>
        	<select class="custom-select" id="inputGroupSelect01" name="category">
				<option selected value="<?php echo $category_id_slc; ?>"><?php echo $category_slc ?></option>
          
		          	<?php
		            	$result = getAllNewsCategory();

		            	if ($result != false) 
		            	{
		              		while ($row = $result->fetch_assoc()) 
		              	{
		                	$category_id = $row['category_id'];
		                	$category = $row['category'];
		              
		          	?>

          		<option value="<?php echo $category_id; ?>"><?php echo $category; ?></option>

			      	<?php        
			          	}
			        }
			      	?>
        	</select>
      	</div>

	  	<div class="form-group">
	    	<textarea class="form-control" name="content" placeholder="Enter News content..." rows="5"><?php echo $content_slc; ?></textarea>
	  	</div>

	  	<?php
				}
			}

		 ?>


	  	<div class="form-group">
	  		<button type="submit" name="submit" class="btn btn-secondary">Update Now!</button>
	  	</div>
	  	

	</form>
</div>
