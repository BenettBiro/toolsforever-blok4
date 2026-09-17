<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'administrator') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

require 'database.php';

$id        = $_POST['user_id'];
$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname  = htmlspecialchars(trim($_POST['lastname']));

$role      = htmlspecialchars(trim($_POST['role']));

// LET OP: vergeet WHERE niet — anders worden ALLE users bijgewerkt!
$stmt = $conn->prepare(
    "UPDATE users
     SET firstname = :firstname,
         lastname = :lastname,
     
         role = :role
     WHERE id = :id"
);
$stmt->execute([
    'firstname' => $firstname,
    'lastname'  => $lastname,
    
    'role'      => $role,
    'id'        => $id,
]);

header('Location: users_index.php');
exit;
?>