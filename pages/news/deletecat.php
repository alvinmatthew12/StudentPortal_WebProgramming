<?php 

$id = $_GET['id'];

require '../../core/base.php';
require_once $baseUrl.'/core/init.php';

	if (deleteNewsCategory($id))
	{
		$link = $_SERVER["HTTP_REFERER"];
		echo '<script type="text/javascript">
			window.location = "'.$link.'&status=successdelete"
		</script>';

	} else {

	}

 ?>