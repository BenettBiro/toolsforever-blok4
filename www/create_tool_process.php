<?php
require 'database.php';

if (empty($_POST['naam'])) {
    echo "Naam tool is required";
    exit;
}

if (strlen($_POST['naam']) < 3) {
    echo "Naam is too short";
    exit;
}

if (empty($_POST['brand']) || strlen($_POST['brand']) < 3) {
    echo "brand veld moet volledig zijn";
    exit;
}

if (!is_numeric($_POST['prijs'])) {
    echo "prijs moet wel een getal zijn";
    exit;
}

if ($_POST['prijs'] > 1000) {
    echo "prijs is te groot, de prijs moet kleiner zijn dan 1000";
    exit;
}

if (!filter_var($_POST['afbeelding'], FILTER_VALIDATE_URL)) {
    echo "afbeelding moet wel een geldige URL zijn";
    exit;
}

if (strlen($_POST['afbeelding']) > 255) {
    echo "afbeelding moet wel kleiner zijn dan 255 karakters";
    exit;
}

$naam = $_POST['naam'];
$brand = $_POST['brand'];
$categorie = $_POST['categorie'];
$prijs = $_POST['prijs'];
$afbeelding = $_POST['afbeelding'];

$stmt = $conn->prepare("INSERT INTO tools (tool_name, tool_brand, tool_category, tool_price, tool_image) VALUES (:naam, :brand, :categorie, :prijs, :afbeelding)");
$result = $stmt->execute([
    'naam' => $naam,
    'brand' => $brand,
    'categorie' => $categorie,
    'prijs' => $prijs,
    'afbeelding' => $afbeelding
]);

if ($result) {
    header("location: tool_index.php");
    exit;
} else {
    echo "Tool niet aangemaakt";
}
?>