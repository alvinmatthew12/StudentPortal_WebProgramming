<?php 

// function totalcourse($id){
// 	global $connect;

// 	$sql = "SELECT COUNT(course_id) as total FROM tb_courses WHERE studyprogram_id = '$id'";
// 	$query = $connect->query($sql);
// 	$result = mysqli_fetch_assoc($query);

// 	return $result['total'] + 1 ;
// }

function addCourseByStudyProgram($studyprogram) {

	global $connect;

    $course_id = $_POST['course_id'];
	$course_name = $_POST['course_name'];
	$course_credits = $_POST['course_credits'];
	$course_semester = $_POST['course_semester'];
	$lecturer = $_POST['lecturer'];

	$sql = "INSERT INTO tb_courses (course_id, course_name, credits, semester_id, studyprogram_id, lecturer_id) VALUES ('$course_id', '$course_name','$course_credits','$course_semester','$studyprogram', '$lecturer')";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}

$connect->close();

}

function getCourseByStudyProgram($studyprogram) {
	global $connect;

	$sql = "SELECT tb_courses.*, tb_lecturer.name FROM tb_courses INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_courses.studyprogram_id = '$studyprogram' ORDER BY tb_courses.semester_id ASC";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}


function getCourseByStudyProgramGroupByCourse($studyprogram) {
    global $connect;

    $sql = "SELECT tb_courses.* FROM tb_courses WHERE tb_courses.studyprogram_id = '$studyprogram' GROUP BY tb_courses.course_id ORDER BY tb_courses.semester_id ASC ";
    $query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getCourse($id) {
	global $connect;

	$sql = "SELECT tb_courses.*, tb_lecturer.name, tb_studyprogram.studyprogram FROM tb_courses INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id INNER JOIN tb_studyprogram ON tb_courses.studyprogram_id = tb_studyprogram.studyprogram_id WHERE tb_courses.id = '$id'";
 	$query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function updateCourse($id) {
    global $connect;

    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
	$course_credits = $_POST['course_credits'];
	$course_semester = $_POST['course_semester'];
	$lecturer = $_POST['lecturer'];
    

    $sql = "UPDATE tb_courses SET course_id = '$course_id', course_name = '$course_name' , semester_id = '$course_semester', lecturer_id = '$lecturer', credits = '$course_credits' WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

function deleteCourse($id) {
    global $connect;

    $sql = "DELETE FROM tb_courses WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}
 ?>