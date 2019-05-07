<?php

session_start();

function userExists($username) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM tb_user WHERE username = '$username'";
	$query = $connect->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function registerStudent() {

	global $connect;

	$username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $studyprogram = $_POST['studyprogram'];
    $semester = $_POST['semester'];
    $student_id = $_POST['student_id'];
	
	$salt = salt(32);
	$newPassword = makePassword($password, $salt);
	if($newPassword) {
		$sql = "INSERT INTO tb_user (username, password, salt, user_role, user_id) VALUES ('$username', '$newPassword', '$salt' , 1, '$student_id')";
		$sql1 = "INSERT INTO tb_student (student_id, name, studyprogram_id, current_semester, status) VALUES ('$student_id', '$name','$studyprogram','$semester', 1)";
		$query = $connect->query($sql);
		$query = $connect->query($sql1);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
} // register user funtion

function registerLecturer() {

	global $connect;

  	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$cpassword = $_POST['cpassword'];
  	$lecturer_id = $_POST['lecturer_id'];
  	$name = $_POST['name'];
  	$studyprogram = $_POST['studyprogram'];
	
	$salt = salt(32);
	$newPassword = makePassword($password, $salt);
	if($newPassword) {
		$sql = "INSERT INTO tb_user (username, password, salt, user_role, user_id) VALUES ('$username', '$newPassword', '$salt' , 2, '$lecturer_id')";
        $sql1 = "INSERT INTO tb_lecturer (lecturer_id, name, studyprogram_id, status) VALUES ('$lecturer_id', '$name', '$studyprogram', 1)";
		$query = $connect->query($sql);
		$query = $connect->query($sql1);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
} // register user funtion

function userdata($username) {
	global $connect;
	$sql = "SELECT * FROM tb_user WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function login($username, $password) {
	global $connect;
	$userdata = userdata($username);

	if($userdata) {
		$makePassword = makePassword($password, $userdata['salt']);
		$sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$makePassword'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM tb_user WHERE id = $id";
	$query = $connect->query($sql);
	$resultuser = $query->fetch_assoc();

	if ($resultuser['user_role'] == '1') {
		$sql = "SELECT * FROM tb_student WHERE student_id = '".$resultuser['user_id']."'";
		$query = $connect->query($sql);
		$result = $query->fetch_assoc();
		$result['user_role'] = $resultuser['user_role'];
	}
	elseif ($resultuser['user_role'] == '2') {
		$sql = "SELECT * FROM tb_lecturer WHERE lecturer_id = '".$resultuser['user_id']."'";
		$query = $connect->query($sql);
		$result = $query->fetch_assoc();
		$result['user_role'] = $resultuser['user_role'];
	}
	elseif ($resultuser['user_role'] == '3') {
		$result = array('name' => 'administrator', 'user_role' => '3');
	}

	return $result;

	$connect->close();
}

function getUserSaltByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM tb_user WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}


function getUserProfileByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM tb_user WHERE id = $id";
	$query = $connect->query($sql);
	$resultuser = $query->fetch_assoc();

	if ($resultuser['user_role'] == '1') {
		$sql = "SELECT tb_student.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_student INNER JOIN tb_studyprogram ON tb_student.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_student.religion_id = tb_religion.religion_id WHERE tb_student.student_id = '".$resultuser['user_id']."'";
		$query = $connect->query($sql);
		if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }
	}
	elseif ($resultuser['user_role'] == '2') {
		$sql = "SELECT tb_lecturer.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_lecturer INNER JOIN tb_studyprogram ON tb_lecturer.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_lecturer.religion_id = tb_religion.religion_id WHERE tb_lecturer.lecturer_id = '".$resultuser['user_id']."'";
		$query = $connect->query($sql);
		if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }
	}
	elseif ($resultuser['user_role'] == '3') {
		$result = array('name' => 'administrator', 'user_role' => '3');
	}

	return $result;

	$connect->close();
}

function salt($length) {
	return random_bytes($length);
}

function makePassword($password, $salt) {
	return hash('sha256', $password.$salt);
}


function tb_user_exists_by_id($id, $username) {
	global $connect;

	$sql = "SELECT * FROM tb_user WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function updateInfo($id) {
	global $connect;

	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql = "UPDATE tb_user SET username = '$username', name = '$name', email = '$email' WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: index.php');
	}
}

function passwordMatch($id, $password) {
	global $connect;

	$userdata = getUserSaltByUserId($id);

	$makePassword = makePassword($password, $userdata['salt']);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

function changePassword($id, $password) {
	global $connect;

	$salt = salt(32);
	$makePassword = makePassword($password, $salt);

	$sql = "UPDATE tb_user SET password = '$makePassword', salt = '$salt' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

?>