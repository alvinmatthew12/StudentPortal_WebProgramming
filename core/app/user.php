<?php 

    function updateStudentProfile($id) {
        global $connect;

        $birth_place = $_POST['birth_place'];
        $birth_date = $_POST['birth_date'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];

            
        $sql = "UPDATE tb_student SET birth_place = '$birth_place', birth_date = '$birth_date', phone_num = '$phone_num' , religion_id = '$religion', gender = '$gender' WHERE id = '$id'";
        
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }

    function updateLecturerProfile($id) {
        global $connect;

        $birth_place = $_POST['birth_place'];
        $birth_date = $_POST['birth_date'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];

            
        $sql = "UPDATE tb_lecturer SET birth_place = '$birth_place', birth_date = '$birth_date', phone_num = '$phone_num' , religion_id = '$religion', gender = '$gender' WHERE id = '$id'";
        
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }

        $connect->close();
    }
 ?>