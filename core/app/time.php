<?php 

    function getAllTime() {
        global $connect;

        $sql = "SELECT * FROM tb_time";
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