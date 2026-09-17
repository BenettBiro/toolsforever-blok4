<?php

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    echo "Huh? Wat doe je?";
    exit;
}

if (isset($_GET['id'])) {

    require 'database.php';

    $id = $_GET["id"];

    $conn->beginTransaction();

    try {

        $stmt = $conn->prepare("DELETE FROM user_settings WHERE user_id = :id");
        $stmt->execute(['id' => $id]);

        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $conn->commit();

    } catch (Exception $e) {
        $conn->rollBack();
        die("Er ging iets fout: " . htmlspecialchars($e->getMessage()));
    }

    header("Location: users_index.php");
    exit;
}