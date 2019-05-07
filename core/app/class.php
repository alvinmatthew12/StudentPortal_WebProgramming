<?php

    function getAllClass() {
        global $connect;

        $sql = "SELECT * FROM tb_class";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function getClass($id) {
        global $connect;

        $sql = "SELECT * FROM tb_class WHERE id = '$id'";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateClass($id) {
        global $connect;

        $room_name = $_POST['room_name'];
        $quota = $_POST['quota'];

        $sql = "UPDATE tb_class SET room_name = '$room_name' , quota = '$quota' WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function addClass() {
        global $connect;

        $room_name = $_POST['room_name'];
        $quota = $_POST['quota'];
        $sql = "INSERT INTO tb_class (room_name, quota) VALUES ('$room_name', '$quota')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function deleteClass($id) {
        global $connect;

        $sql = "DELETE FROM tb_class WHERE id = '$id'";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }
?>