<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "crm_meckano";

    // Creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    // Check connection to DB, if not db connection.
    if(!$con){
        die("Connection Failed ". mysqli_connect_error());
    }else{
        ob_start(); // Start output buffering
        echo "Connnected successfully"; // This will be stored in the buffer
        ob_end_clean(); // Clear the buffer without sending the output
    }

?>