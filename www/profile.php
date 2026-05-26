<?php
session_start();

if (empty($_SESSION['user_id'])) {
    echo "Je bent niet ingelogd";
    echo "<a href='login.php'>Login hier in</a>";
    exit;
}

require 'database.php';


$user_id = $_SESSION['user_id'];

$sql = "SELECT users.firstname, users.lastname, users.email,
               user_settings.backgroundColor, user_settings.font
        FROM users
            JOIN user_settings
                ON users.id = user_settings.user_id
        WHERE users.id = $user_id";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
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
    $sql_all = "SELECT users.firstname, users.lastname, users.email,
                   user_settings.backgroundColor, user_settings.font
            FROM users
                JOIN user_settings
                    ON users.id = user_settings.user_id";

    $result_all = mysqli_query($conn, $sql_all);
    $all_users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    ?>

    <h2>Alle gebruikers</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Thema</th>
                <th>Lettertype</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_users as $u): ?>
                <tr>
                    <td><?php echo $u['firstname'] . ' ' . $u['lastname']; ?></td>
                    <td><?php echo $u['email']; ?></td>
                    <td><?php echo $u['backgroundColor']; ?></td>
                    <td><?php echo $u['font']; ?></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>

</html>