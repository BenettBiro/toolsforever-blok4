<?php
require 'database.php';

$id          = $_POST['brand_id'];
$brand_name  = htmlspecialchars(trim($_POST['brand_name']));
$brand_image = htmlspecialchars(trim($_POST['brand_image']));

// LET OP: vergeet WHERE niet — anders worden ALLE brands bijgewerkt!
$stmt = $conn->prepare(
    "UPDATE brands
     SET brand_name = :brand_name,
         brand_image = :brand_image
     WHERE brand_id = :id"
);
$stmt->execute([
    'brand_name'  => $brand_name,
    'brand_image' => $brand_image,
    'id'          => $id,
]);

header('Location: brands_index.php');
exit;
?>