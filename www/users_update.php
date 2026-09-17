<?php
require 'database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: users_index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: users_index.php');
    exit;
}
?>

<form method="POST" action="users_update_process.php">
    <!-- Stuur het id mee als verborgen veld -->
    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

    <label>Naam</label>
    <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>">

    <label>Categorie</label>
    <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>">

    <label>Prijs</label>
    <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>">

    <button type="submit">Opslaan</button>
</form>