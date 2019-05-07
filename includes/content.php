<!-- Start of Content -->
<div class="col-md-9 col-xs-12">
	<div class="row">
		<div class="col-md-12 pb-3">
				<div class="card">
		

			<?php 
				if(isset($_GET['page'])){
					$page = $_GET['page'];

					switch ($page) {
						case 'news':
							include $baseUrl."pages/news/news.php";
							break;
						case 'course':
							include $baseUrl."pages/course/course.php";
							break;
						case 'register':
							include $baseUrl."pages/student/register.php";
							break;
						case 'managecourse':
							include $baseUrl."pages/course/index.php";
							break;
						case 'addcourse':
							include $baseUrl."pages/course/addcourse.php";
							break;
						case 'editcourse':
							include $baseUrl."pages/course/edit.php";
							break;
						case 'deletecourse':
							include $baseUrl."pages/course/delete.php";
							break;
						case 'addlecturertocourse':
							include $baseUrl."pages/course/addlecturer.php";
							break;
						case 'postnews':
							include $baseUrl."pages/news/postnews.php";
							break;
						case 'editnews':
							include $baseUrl."pages/news/edit.php";
							break;
						case 'studyprogram':
							include $baseUrl."pages/studyprogram/index.php";
							break;
						case 'addstudpro':
							include $baseUrl."/pages/studyprogram/add.php";
							break;
						case 'editstudpro':
							include $baseUrl."/pages/studyprogram/edit.php";
							break;
						case 'semester':
							include $baseUrl."/pages/semester/index.php";
							break;
						case 'addsemester':
							include $baseUrl."/pages/semester/add.php";
							break;
						case 'editsemester':
							include $baseUrl."/pages/semester/edit.php";
							break;
						case 'class':
							include $baseUrl."/pages/class/index.php";
							break;
						case 'addclass':
							include $baseUrl."/pages/class/add.php";
							break;
						case 'editclass':
							include $baseUrl."/pages/class/edit.php";
							break;
						case 'student':
							include $baseUrl."/pages/student/index.php";
							break;
						case 'editstudent':
							include $baseUrl."/pages/student/edit.php";
							break;
						case 'detailstudent':
							include $baseUrl."/pages/student/detail.php";
							break;
						case 'editdetailstudent':
							include $baseUrl."/pages/student/editdetail.php";
							break;
						case 'lecturer':
							include $baseUrl."/pages/lecturer/index.php";
							break;
						case 'addlecturer':
							include $baseUrl."/pages/lecturer/add.php";
							break;
						case 'editlecturer':
							include $baseUrl."/pages/lecturer/edit.php";
							break;
						case 'detaillecturer':
							include $baseUrl."/pages/lecturer/detail.php";
							break;
						case 'editdetaillecturer':
							include $baseUrl."/pages/lecturer/editdetail.php";
							break;
						case 'newscategory':
							include $baseUrl."/pages/news/newscategory.php";
							break;
						case 'editnewscategory':
							include $baseUrl."/pages/news/editnewscategory.php";
							break;
						case 'addnewscategory':
							include $baseUrl."/pages/news/addnewscategory.php";
							break;
						case 'schedule':
							include $baseUrl."/pages/schedule/index.php";
							break;
						case 'addschedule':
							include $baseUrl."/pages/schedule/add.php";
							break;
						case 'editschedule':
							include $baseUrl."/pages/schedule/edit.php";
							break;
						case 'userprofile':
							include $baseUrl."/pages/user/profile.php";
							break;
						case 'edituserprofile':
							include $baseUrl."/pages/user/edit.php";
							break;
						case 'krs':
							include $baseUrl."/pages/krs/index.php";
							break;
						case 'myschedule':
							include $baseUrl."/pages/krs/myschedule.php";
							break;
						case 'lecturerschedule':
							include $baseUrl."/pages/lecturer/myschedule.php";
							break;
						case 'managegrade':
							include $baseUrl."/pages/grade/mng_grade.php";
							break;
						case 'managestudentgrade':
							include $baseUrl."/pages/grade/mng_studentgrade.php";
							break;
						case 'khs':
							include $baseUrl."/pages/khs/index.php";
							break;
						default:
							include $baseUrl."/404.php";
							break;
					}
				}else{
					include $baseUrl."pages/profile.php";
				}

		 	?>
		 	
			</div>
		</div>	 	
	</div>
</div>
<!-- End of Content -->