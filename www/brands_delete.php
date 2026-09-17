<?php

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    echo "Huh? Wat doe je?";
    exit;
}

if (isset($_GET['id'])) {

    require 'database.php';

    $id = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM brands WHERE brand_id = :id");
    $stmt->execute(['id' => $id]);

    header("location: brands_index.php");
}