<?php
    $dbSerever = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $database = "ebuy";

    //mysql connection

    $conn = mysqli_connect($dbSerever,$dbUser,$dbPass,$database);

    if($conn){
        // echo "success hello";
    }


?>