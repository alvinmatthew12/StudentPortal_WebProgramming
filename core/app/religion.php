<?php 

function getAllReligion() {
    global $connect;

    $sql = "SELECT * FROM tb_religion";
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