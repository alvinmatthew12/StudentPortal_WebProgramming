<?php

    function getAllStudyProgram() {
        global $connect;

        $sql = "SELECT * FROM tb_studyprogram";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getStudyProgram($id) {
        global $connect;

        $sql = "SELECT * FROM tb_studyprogram WHERE id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }


    function getStudyProgramName($id) {
        global $connect;

        $sql = "SELECT * FROM tb_studyprogram WHERE studyprogram_id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateStudyProgram($id) {
        global $connect;

        $studyprogram_id = $_POST['studyprogram_id'];
        $studyprogram_name = $_POST['studyprogram_name'];
        $abbr = $_POST['abbr'];

        $sql = "UPDATE tb_studyprogram SET studyprogram_id = '$studyprogram_id' , studyprogram = '$studyprogram_name' , abbreviation = '$abbr' WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function addStudyProgram() {
        global $connect;

        $studyprogram_id = $_POST['studyprogram_id'];
        $studyprogram_name = $_POST['studyprogram_name'];
        $abbr = $_POST['abbr'];

        $sql = "INSERT INTO tb_studyprogram (studyprogram_id, studyprogram, abbreviation) VALUES ('$studyprogram_id', '$studyprogram_name', '$abbr')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function deleteStudyProgram($id) {
        global $connect;

        $sql = "DELETE FROM tb_studyprogram WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }
?>