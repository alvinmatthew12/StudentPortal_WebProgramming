<?php

    function getAllSemester() {
        global $connect;

        $sql = "SELECT * FROM tb_semester";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getSemester($id) {
        global $connect;

        $sql = "SELECT * FROM tb_semester WHERE id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateSemester($id) {
        global $connect;

        $semester_id = $_POST['semester_id'];
        $semester_name = $_POST['semester_name'];

        $sql = "UPDATE tb_semester SET semester_id = '$semester_id' , semester_name = '$semester_name' WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function addSemester() {
        global $connect;

        $semester_id = $_POST['semester_id'];
        $semester_name = $_POST['semester_name'];
        $sql = "INSERT INTO tb_semester (semester_id, semester_name) VALUES ('$semester_id', '$semester_name')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function deleteSemester($id) {
        global $connect;

        $sql = "DELETE FROM tb_semester WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }
?>