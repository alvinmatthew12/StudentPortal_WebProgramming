<!-- Start of Sidebar -->
<div class="col-md-3 col-xs-12" style="font-size: 15px;">
	<div class="row">

		<?php  

			if (logged_in() === FALSE)
				{
		?>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-university"></i> Academic</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=course'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Courses</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=news'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> News</a>
					</li>
				</ul>
			</div>
		</div>

		<?php 

			}

			if (logged_in() === TRUE) {

				$userdata = getUserDataByUserId($_SESSION['id']);
				$user_role = $userdata['user_role'];

				if ($user_role == '1')
				{
					

		 ?>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-compass"></i> My Navigation</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=myschedule'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> My Schedule</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=khs" class="nav-link"><i class="fas fa-caret-right"></i> My Achievement Record</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-university"></i> Academic</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=course' ?>" class="nav-link"><i class="fas fa-caret-right"></i> Courses</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=krs' ?>" class="nav-link"><i class="fas fa-caret-right"></i> Form of Study Plan</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=news' ?>" class="nav-link"><i class="fas fa-caret-right"></i> News</a>
					</li>
				</ul>
			</div>
		</div>

		<?php 

			}
			if ($user_role == '3') {

		 ?>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-user-cog"></i> Admin Tools</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=register'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Register Student</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=postnews'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Post News</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=managecourse'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Courses</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=schedule'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Schedule</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=studyprogram'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Study Program</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=semester'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Semester</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=class'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Class</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=student'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Student</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=lecturer'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage Lecturer</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=newscategory'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Manage News Category</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-university"></i> Academic</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=course'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> Courses</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=news'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> News</a>
					</li>
				</ul>
			</div>
		</div>

	<?php
			}
			if ($user_role == '2') {
	?>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-compass"></i> My Navigation</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=lecturerschedule'; ?>" class="nav-link"><i class="fas fa-caret-right"></i> My Schedule</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=managegrade" class="nav-link"><i class="fas fa-caret-right"></i> Manage Student Grade</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 pb-2">
			<div class="card">
				<p class="ml-4 simple-text"><i class="fas fa-university"></i> Academic</p>
				<hr>
				
				<ul class="nav flex-column py-2 mb-2 ml-4">
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=course' ?>" class="nav-link"><i class="fas fa-caret-right"></i> Courses</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo $baseUrl.'index.php?page=news' ?>" class="nav-link"><i class="fas fa-caret-right"></i> News</a>
					</li>
				</ul>
			</div>
		</div>

	<?php
			}
		}
	?>

	</div>
</div>
<!-- End of Sidebar -->