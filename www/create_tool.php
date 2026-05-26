<?php require 'session_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak tool</title>
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
    <h1>Maak tool</h1>
    <form action="create_tool_process.php" method="post">
        <div class="form-group">
            <label for="naam">Naam tool</label>
            <input type="text" name="naam" id="naam" placeholder="vb: Boormachine">
        </div>
        <div class="form-group">
            <label for="brand">Naam brand</label>
            <input type="text" name="brand" id="brand" placeholder="vb: Bosch">
        </div>
        <div class="form-group">
            <label for="categorie">Categorie</label>
            <input type="text" name="categorie" id="categorie" placeholder="vb: Boren">
        </div>
        <div class="form-group">
            <label for="prijs">Prijs</label>
            <input type="number" name="prijs" id="prijs" placeholder="20">
        </div>
        <div class="form-group">
            <label for="afbeelding">Afbeelding</label>
            <input type="text" name="afbeelding" id="afbeelding" placeholder="https://example.com/image.jpg">
        </div>
        <button type="submit">Maak tool</button>
    </form>
</body>
</html>