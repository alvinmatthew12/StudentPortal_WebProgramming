<?php
    include 'base.php';


    $cssPath = $baseUrl."assets/css";
    $jsPath = $baseUrl."assets/js";
    $imagePath = $baseUrl."assets/images";

    $linkdomain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "portal_mahasiswa";
    // $servername = "127.0.0.1";
    // $username = "utemwebi_1731092";
    // $password = "alvin1731092";
    // $dbname = "utemwebi_1731092";

    // crearte connection
    $connect = new Mysqli($servername, $username, $password, $dbname);

    // check connection
    if($connect->connect_error) {
        
        die("Connection Failed : " . mysqli_connect_error());
    } else {
        // echo "Successfully Connected";	
    }

?>