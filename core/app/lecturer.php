<?php

    function getAllLecturerData() {
        global $connect;

        $sql = "SELECT tb_lecturer.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_lecturer INNER JOIN tb_studyprogram ON tb_lecturer.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_lecturer.religion_id = tb_religion.religion_id ORDER BY tb_lecturer.id ASC";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }


    function getAllLecturerByStudyProgram($id) {
        global $connect;

        $sql = "SELECT tb_lecturer.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_lecturer INNER JOIN tb_studyprogram ON tb_lecturer.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_lecturer.religion_id = tb_religion.religion_id WHERE tb_lecturer.studyprogram_id = '$id' ORDER BY tb_lecturer.id ASC";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getLecturer($id) {
        global $connect;

        $sql = "SELECT tb_lecturer.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_lecturer INNER JOIN tb_studyprogram ON tb_lecturer.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_lecturer.religion_id = tb_religion.religion_id WHERE tb_lecturer.id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateLecturerStatus($id, $status) {
        global $connect;

        if ($status == '1') {
            $sql = "UPDATE tb_lecturer SET status = '2' WHERE id = '$id'";
        }
        if ($status == '2') {
            $sql = "UPDATE tb_lecturer SET status = '1' WHERE id = '$id'";
        }
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }


    function updateLecturerData($id) {
        global $connect;

        $lecturer_id = $_POST['lecturer_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];

        $sql = "UPDATE tb_lecturer SET lecturer_id = '$lecturer_id' , name = '$name', studyprogram_id = '$studyprogram' WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateLecturerDetail($id) {
        global $connect;

        $lecturer_id = $_POST['lecturer_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $birth_place = $_POST['birth_place'];
        $birth_date = $_POST['birth_date'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];

            
        $sql = "UPDATE tb_lecturer SET lecturer_id = '$lecturer_id' , name = '$name', studyprogram_id = '$studyprogram', birth_place = '$birth_place', birth_date = '$birth_date', phone_num = '$phone_num' , religion_id = '$religion', gender = '$gender' WHERE id = '$id'";
        
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function addLecturer() {
        global $connect;

        $lecturer_id = $_POST['lecturer_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $sql = "INSERT INTO tb_lecturer (lecturer_id, name, studyprogram_id) VALUES ('$lecturer_id', '$name', '$studyprogram')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }


    function getLecturerSchedule($id) {
        global $connect;

        $userdata = getUserDataByUserId($id);

        $sql = "SELECT tb_lecturer.*, tb_schedule.*, tb_courses.*, tb_time.* FROM tb_schedule INNER JOIN tb_courses ON tb_schedule.course_id = tb_courses.course_id INNER JOIN tb_time ON tb_schedule.time_id = tb_time.time_id INNER JOIN tb_lecturer ON tb_courses.lecturer_id = tb_lecturer.lecturer_id WHERE tb_lecturer.lecturer_id = '".$userdata['lecturer_id']."' ORDER BY tb_time.time_id";
        $query = $connect->query($sql);
        if ($query->num_rows > 0){
            return $query;
        } else {
            return false;
        }
    }

?>