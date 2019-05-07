<?php 

    function getUniProfile() {
        global $connect;

        $sql = "SELECT * FROM tb_uni_profile";
        $query = $connect->query($sql);
        if ($query->num_rows > 0)
        {
            return $query;
        } else {
            return false;
        }

        $connect->close();
    }

 ?>