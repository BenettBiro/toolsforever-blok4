<?php

require 'database.php';

$sql = "SELECT users.id, users.firstname, users.lastname, users.email,
               user_settings.backgroundColor, user_settings.font
        FROM users
            JOIN user_settings
                ON users.id = user_settings.user_id";

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikers & Instellingen</title>
</head>
<body>
    <h1>Gebruikers overzicht</h1>

    <?php foreach($users as $user): ?>
       <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
    <h2><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h2>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Achtergrondkleur: <?php echo $user['backgroundColor']; ?></p>
    <p>Lettertype: <?php echo $user['font']; ?></p>
</div>
    <?php endforeach; ?>

</body>
</html>