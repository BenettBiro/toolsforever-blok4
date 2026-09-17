<?php
require 'database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: tool_index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tools WHERE tool_id = :id");
$stmt->execute(['id' => $id]);
$tool = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tool) {
    header('Location: tool_index.php');
    exit;
}
?>

<form method="POST" action="tool_update_process.php">
    <!-- Stuur het id mee als verborgen veld -->
    <input type="hidden" name="tool_id" value="<?= $tool['tool_id'] ?>">

    <label>Naam</label>
    <input type="text" name="tool_name" value="<?= htmlspecialchars($tool['tool_name']) ?>">

    <label>Categorie</label>
    <input type="text" name="tool_category" value="<?= htmlspecialchars($tool['tool_category']) ?>">

    <label>Prijs</label>
    <input type="number" name="tool_price" value="<?= htmlspecialchars($tool['tool_price']) ?>">

    <button type="submit">Opslaan</button>
</form>