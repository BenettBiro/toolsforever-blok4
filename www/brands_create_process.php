<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'administrator') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

require 'database.php';

$brand_name  = htmlspecialchars(trim($_POST['name']));
$brand_image = htmlspecialchars(trim($_POST['image']));

$stmt = $conn->prepare(
    "INSERT INTO brands (brand_name, brand_image)
     VALUES (:brand_name, :brand_image)"
);
$stmt->execute([
    'brand_name'  => $brand_name,
    'brand_image' => $brand_image,
]);

header('Location: brands_index.php');
exit;
?>