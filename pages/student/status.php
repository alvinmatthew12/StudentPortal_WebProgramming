<?php 

$id = $_GET['id'];
$status = $_GET['stdstts'];

require '../../core/base.php';
require_once $baseUrl.'/core/init.php';

	if (updateStudentStatus($id, $status))
	{
		$link = $_SERVER["HTTP_REFERER"];
		echo '<script type="text/javascript">
			window.location = "'.$link.'&status=successdelete"
		</script>';

	} else {

	}

 ?>