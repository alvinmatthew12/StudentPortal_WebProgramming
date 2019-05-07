<?php 

function addStudentCourses($id) {
	global $connect;
	
	$userdata = getUserDataByUserId($id);

	$query = true;
	foreach($_POST['schedule_id'] as $value) {

		$sql1 = "SELECT * FROM tb_student_courses WHERE student_id = '".$userdata['student_id']."' AND schedule_id = '$value'";
		$query1 = $connect->query($sql1);

		if ($query1->num_rows == 0){ 
		    $sql = "INSERT INTO tb_student_courses(student_id, schedule_id, takein_semester) VALUES ('".$userdata['student_id']."', '$value', '".$userdata['current_semester']."')";
			$query = $connect->query($sql);
	    }
	}
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}

    $connect->close();
}

function getKrsByStudyProgram($studyprogram) {
	global $connect;


	$sql = "SELECT tb_schedule.*, tb_courses.*, tb_time.*, tb_class.*, tb_lecturer.name FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_class ON tb_schedule.room_name = tb_class.room_name INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_courses.studyprogram_id = '$studyprogram'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}


function getKrsByStudyProgramAndSemester($studyprogram, $semester) {
	global $connect;


	$sql = "SELECT tb_schedule.*, tb_courses.*, tb_time.*, tb_class.*, tb_lecturer.name FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_class ON tb_schedule.room_name = tb_class.room_name INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_courses.studyprogram_id = '$studyprogram' AND tb_courses.semester_id = '$semester'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getStudentCouses($id) {
	global $connect;

	$userdata = getUserDataByUserId($id);

	$sql = "SELECT tb_student_courses.*, tb_schedule.*, tb_courses.*, tb_time.*, tb_lecturer.name FROM tb_student_courses INNER JOIN tb_schedule ON tb_student_courses.schedule_id = tb_schedule.schedule_id INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_student_courses.student_id = '".$userdata['student_id']."'";
	$query = $connect->query($sql);
	if ($query->num_rows > 0){
        return $query;
    } else {
        return false;
    }

}

function getStudentCousesBySemester($id, $semester) {
	global $connect;

	$userdata = getUserDataByUserId($id);

	$sql = "SELECT tb_student_courses.*, tb_schedule.*, tb_courses.*, tb_time.*, tb_lecturer.name FROM tb_student_courses INNER JOIN tb_schedule ON tb_student_courses.schedule_id = tb_schedule.schedule_id INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_student_courses.student_id = '".$userdata['student_id']."' AND tb_student_courses.takein_semester = '$semester'";
	$query = $connect->query($sql);
	if ($query->num_rows > 0){
        return $query;
    } else {
        return false;
    }

}


function deleteMySchedule($id) {
    global $connect;

    $sql = "DELETE FROM tb_student_courses WHERE ss_id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

 ?>