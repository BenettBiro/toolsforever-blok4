<?php
session_start();

if (empty($_SESSION['user_id'])) {
    echo "Je bent niet ingelogd";
    echo "<a href='login.php'>Login hier in</a>";
    exit;
}
?>
<!DOCTYPE html>\
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker aanmaken</title>
    <style>
        label {
            width: 140px;
            display: inline-block;
        }

        .form-group {
            margin: 10px 0px;
        }
    </style>
</head>

<body>
    <h1>Gebruiker aanmaken</h1>
    <form action="user_add_process.php" method="post">
        <div class="form-group">
            <label for="firstname">Voornaam</label>
            <input type="text" name="firstname" id="firstname" placeholder="Jan">
        </div>
        <div class="form-group">
            <label for="lastname">Achternaam</label>
            <input type="text" name="lastname" id="lastname" placeholder="Jansen">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="jan@jansen.nl">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="********">
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select name="role" id="role">
                <option value="administrator">administrator</option>
                <option value="teacher">Docent</option>
                <option value="student">Leerling</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" name="address" id="address" placeholder="Straatnaam 1">
        </div>
        <div class="form-group">
            <label for="city">Stad</label>
            <input type="text" name="city" id="city" placeholder="Amsterdam">
        </div>
        <div class="form-group">
            <label for="is_active">Actief</label>
            <select name="is_active" id="is_active">
                <option value="1">Ja</option>
                <option value="0">Nee</option>
            </select>
        </div>
        <button type="submit">Aanmaken</button>
    </form>
</body>

</html>