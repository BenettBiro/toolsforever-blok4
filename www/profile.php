<?php
session_start();

if (empty($_SESSION['user_id'])) {
    echo "Je bent niet ingelogd";
    echo "<a href='login.php'>Login hier in</a>";
    exit;
}

require 'database.php';


$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT users.firstname, users.lastname, users.email,
               user_settings.backgroundColor, user_settings.font
        FROM users
            JOIN user_settings
                ON users.id = user_settings.user_id
        WHERE users.id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Mijn profiel</title>
</head>

<body>
    <h1>Welkom, <?php echo $user['firstname']; ?>!</h1>

    <h2>Mijn gegevens</h2>
    <p>Naam: <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>

    <h2>Mijn instellingen</h2>
    <p>Achtergrondkleur: <?php echo $user['backgroundColor']; ?></p>
    <p>Lettertype: <?php echo $user['font']; ?></p>

    <?php
    $stmt_all = $conn->prepare("SELECT users.firstname, users.lastname, users.email,
           user_settings.backgroundColor, user_settings.font,
           address.street, address.city
    FROM users
        JOIN user_settings ON users.id = user_settings.user_id
        LEFT JOIN address ON users.id = address.user_id
    WHERE users.id = :user_id");
    $stmt_all->execute(['user_id' => $user_id]);
    $all_users = $stmt_all->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2>Alle gebruikers</h2>
    <p> Straatnaam: <?php echo $all_users[0]['street']; ?></p>
    <p> Stad: <?php echo $all_users[0]['city']; ?></p>
    <table border="1">
        <thead>

        </thead>
        <tbody>
            <?php foreach ($all_users as $user): ?>
                <tr>
                    <td><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['backgroundColor']; ?></td>
                    <td><?php echo $user['font']; ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>