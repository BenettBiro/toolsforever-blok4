<?php

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    echo "Huh? Wat doe je?";
    exit;
}

if (isset($_GET['id'])) {

    require 'database.php';

    $id =  $_GET["id"]; 

    mysqli_begin_transaction($conn);

    try {
       
        mysqli_query($conn, "DELETE FROM user_settings WHERE user_id = $id");

      
        mysqli_query($conn, "DELETE FROM users WHERE id = $id");

        mysqli_commit($conn);

    } catch (Exception $e) {
        mysqli_rollback($conn);
        die("Er ging iets fout: " . $e->getMessage());
    }

    header("location: users_index.php");
}