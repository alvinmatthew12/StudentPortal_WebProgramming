<?php 

function getCoursesByLecturerID($id) {
	global $connect;

	$userdata = getUserDataByUserId($id);
	$sql = "SELECT * FROM tb_courses WHERE tb_courses.lecturer_id = '".$userdata['lecturer_id']."'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getCourseBySemester($id) {
    global $connect;

    $sql = "SELECT * FROM tb_courses WHERE id = '$id'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    return $result;

    $connect->close();
}

function getStudentByCourseID($id) {
	global $connect;

    $course = getCourseBySemester($id);

	$sql = "SELECT tb_student.*, tb_schedule.*, tb_courses.*, tb_student_courses.* FROM tb_courses INNER JOIN tb_schedule ON tb_courses.course_id = tb_schedule.course_id INNER JOIN tb_student_courses ON tb_schedule.schedule_id = tb_student_courses.schedule_id INNER JOIN tb_student ON tb_student_courses.student_id = tb_student.student_id WHERE tb_courses.id = '$id' AND tb_student.current_semester = '".$course['semester_id']."'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getAllMark() {
    global $connect;

    $sql = "SELECT * FROM tb_mark";
    $query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function insertStudentMark() {
    global $connect;

    $mark = $_POST['mark'];
    $student_id = $_POST['student_id'];
    $schedule_id = $_POST['schedule_id'];
    $sql = "UPDATE tb_student_courses SET grade = '$mark' WHERE student_id = '$student_id' AND schedule_id = '$schedule_id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}
 
 ?>

