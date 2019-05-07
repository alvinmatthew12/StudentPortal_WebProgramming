<?php 
	require_once './core/app/uniprofile.php'
 ?>

<div class="card-header bg-white">
	<h3 class="simple-text text-center">PROFILE</h3>
</div>
<div class="card-body">
	<img src="<?php echo $imagePath.'/uni-pic.jpg'; ?>" class="img-fluid" alt="" width="100%">
	<p class="my-4 text-justify" style="white-space: pre-line;">
		<?php 

			$result = getUniProfile();

            if ($result != false) 
            {
              while ($row = $result->fetch_assoc()) 
              {
              	$description = $row['description'];

              	echo $description;
              }
            }
              

		 ?>

	</p>
</div>								
