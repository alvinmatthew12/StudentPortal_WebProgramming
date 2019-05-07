<?php

    function getAllStudent() {
        global $connect;

        $sql = "SELECT tb_student.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_student INNER JOIN tb_studyprogram ON tb_student.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_student.religion_id = tb_religion.religion_id ORDER BY tb_student.current_semester ASC";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getAllStudentByStudyProgram($id) {
        global $connect;

        $sql = "SELECT tb_student.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_student INNER JOIN tb_studyprogram ON tb_student.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_student.religion_id = tb_religion.religion_id WHERE tb_student.studyprogram_id = '$id' ORDER BY tb_student.current_semester ASC";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getStudent($id) {
        global $connect;

        $sql = "SELECT tb_student.*, tb_studyprogram.studyprogram, tb_religion.religion FROM tb_student INNER JOIN tb_studyprogram ON tb_student.studyprogram_id = tb_studyprogram.studyprogram_id LEFT JOIN tb_religion ON tb_student.religion_id = tb_religion.religion_id WHERE tb_student.id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateStudentStatus($id, $status) {
        global $connect;

        if ($status == '1') {
            $sql = "UPDATE tb_student SET status = '2' WHERE id = '$id'";
        }
        if ($status == '2') {
            $sql = "UPDATE tb_student SET status = '1' WHERE id = '$id'";
        }
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }


    function updateStudentData($id) {
        global $connect;

        $student_id = $_POST['student_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $semester = $_POST['semester'];

        $sql = "UPDATE tb_student SET student_id = '$student_id' , name = '$name', studyprogram_id = '$studyprogram', current_semester = '$semester' WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateStudentDetail($id) {
        global $connect;

        $student_id = $_POST['student_id'];
        $name = $_POST['name'];
        $studyprogram = $_POST['studyprogram'];
        $semester = $_POST['semester'];
        $birth_place = $_POST['birth_place'];
        $birth_date = $_POST['birth_date'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];

            
        $sql = "UPDATE tb_student SET student_id = '$student_id' , name = '$name', studyprogram_id = '$studyprogram', current_semester = '$semester', birth_place = '$birth_place', birth_date = '$birth_date', phone_num = '$phone_num' , religion_id = '$religion', gender = '$gender' WHERE id = '$id'";
        
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

?>