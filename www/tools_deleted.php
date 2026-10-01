<?php
require_once 'database.php'; 

$stmt = $conn->prepare("SELECT * FROM tools WHERE deleted_at IS NOT NULL");
$stmt->execute();
$tools = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Verwijderde tools</title>
</head>
<body>
    <h1>Verwijderde tools</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Verwijderd op</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tools as $tool): ?>
                <tr>
                    <td><?= htmlspecialchars($tool['tool_id']) ?></td>
                    <td><?= htmlspecialchars($tool['tool_name']) ?></td>
                    <td><?= htmlspecialchars($tool['deleted_at']) ?></td>
                    <td>
                        <a href="tools_deleted_restore.php?id=<?= urlencode($tool['tool_id']) ?>">Herstellen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>