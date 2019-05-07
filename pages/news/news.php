
<div class=" px-4 py-4">
  <?php 

    if (logged_in() === true) {
      $userdata = getUserDataByUserId($_SESSION['id']);
      $user_role = $userdata['user_role'];

      if ($user_role == '3')
      {
  ?>

    <a href="<?php echo $baseUrl.'index.php?page=postnews'; ?>" class="text-primary simple-text text-right"><i class="fas fa-arrow-alt-circle-right"></i> post news</a>

  <?php
      }
    }
  ?>
  <h3 class="text-center simple-text pb-4"><i class="fas fa-bullhorn"></i> News</h3>

  	<?php 

      if (isset($_GET['status'])) {
        if ($_GET['status'] == "successadd") {
          echo "<div class='alert alert-success text-center'>Successfully Add News</div>";
        }
        elseif ($_GET['status'] == "successdelete") {
          echo "<div class='alert alert-success text-center'>Successfully Delete News</div>";
        }
        elseif ($_GET['status'] == "successedit") {
          echo "<div class='alert alert-success text-center'>Successfully Edit News</div>";
        }

      }


  		$result = getAllNewsData();

  		if ($result != false) {
  			while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
  				$title = $row['title'];
  				$content = $row['content'];
  				$time = $row['create_at'];
  				$writer = $row['create_by'];
  				$category = $row['category'];

  	 ?>
  			


  <div class="card my-4" style="width: 100%">
		<div class="card-header py-2">
			<h5 class="card-title text-primary"><?php echo $title; ?></h5></h5>
			
			<h6 class="card-subtitle mb-2 	text-secondary"><?php echo $category; ?></h5></h6>
		</div>
		<div class="card-body">
			<p><?php echo $content; ?></p>
			<footer class="blockquote-footer text-muted" style="font-size: 12px;">by: <a href="" class="text-primary"><?php echo $writer; ?></a> -  <i class="fas fa-calendar-alt"></i> <?php echo $time; ?></footer>




		</div>

          <?php 

            if (logged_in() === true) {
              $userdata = getUserDataByUserId($_SESSION['id']);
              $user_role = $userdata['user_role'];

              if ($user_role == '3')
              {
          ?>

          <p class="text-muted text-right mr-4"><a href="<?php echo $baseUrl.'index.php?page=editnews&id='.$id.''; ?>" class="text-primary">Edit</a> or <a href="<?php echo $baseUrl.'pages/news/delete.php?id='.$id.''; ?>" class="text-danger">Delete</a></p>

          <?php
              }
            }
          ?>

	</div>
	
	<?php
			 }
  		}

  	 ?>

</div>