<?php
	require './core/base.php';
	require $baseUrl.'/core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student Portal</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once $baseUrl.'/includes/assets.php'; ?>

</head>
<body>
	<?php require_once $baseUrl.'/includes/topnav.php'; ?>

	<div class="container pt-3 pb-3">

		<div class="row">
			<?php require_once $baseUrl.'/includes/header.php'; ?>
			<?php require_once $baseUrl.'/includes/sidebar.php'; ?>

			<?php 
			
			
			require_once $baseUrl.'/includes/content.php'; 

			?>
		</div>

	</div>
	<footer>
		<?php require_once $baseUrl.'/includes/footer.php'; ?>
	</footer>
	
</body>
</html>