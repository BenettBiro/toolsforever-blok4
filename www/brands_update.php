<?php
require 'database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: brands_index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM brands WHERE brand_id = :id");
$stmt->execute(['id' => $id]);
$tool = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$tool) {
    header('Location: brands_index.php');
    exit;
}
?>

<form method="POST" action="brands_update_process.php">
    <!-- Stuur het id mee als verborgen veld -->
    <input type="hidden" name="brand_id" value="<?= $tool['brand_id'] ?>">

    <label>Naam</label>
    <input type="text" name="brand_name" value="<?= htmlspecialchars($tool['brand_name']) ?>">

    <label>Categorie</label>
    <input type="text" name="brand_image" value="<?= htmlspecialchars($tool['brand_image']) ?>">

 
    <button type="submit">Opslaan</button>
</form>