<?php

function totalSchedule($id){
	global $connect;

	$sql = "SELECT COUNT(tb_schedule.schedule_id) as total FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id WHERE tb_courses.studyprogram_id = '$id'";
	$query = $connect->query($sql);
	$result = mysqli_fetch_assoc($query);

	return $result['total'] + 1 ;
}



function getScheduleByStudyProgram($studyprogram) {
	global $connect;

	$sql = "SELECT tb_schedule.*, tb_courses.*, tb_time.*, tb_class.*, tb_lecturer.name FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_class ON tb_schedule.room_name = tb_class.room_name INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_courses.studyprogram_id = '$studyprogram' ORDER BY tb_schedule.s_id ASC";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getOneScheduleByStudyProgram($id) {
	global $connect;

	$sql = "SELECT tb_schedule.*, tb_courses.*, tb_time.*, tb_class.*, tb_lecturer.name FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_class ON tb_schedule.room_name = tb_class.room_name INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_schedule.s_id = '$id'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function addScheduleByStudyProgram($studyprogram) {

	global $connect;

	$course = $_POST['course'];
	$class = $_POST['class'];
	$time = $_POST['time'];
	$totalcourse = totalSchedule($studyprogram);
	$schedule_id = "S$studyprogram"."_"."$totalcourse";

	$sql = "INSERT INTO tb_schedule (schedule_id, course_id, room_name, time_id) VALUES ('$schedule_id', '$course','$class','$time')";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}

$connect->close();

}

function updateSchedule($id) {

	global $connect;

	$course = $_POST['course'];
	$class = $_POST['class'];
	$time = $_POST['time'];

	$sql = "UPDATE tb_schedule SET course_id = '$course', room_name = '$class', time_id = '$time' WHERE s_id = '$id'";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function deleteSchedule($id) {
    global $connect;

    $sql = "DELETE FROM tb_schedule WHERE s_id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

 ?>
