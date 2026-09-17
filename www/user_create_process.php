<?php
require 'database.php';

if (empty($_POST['firstname'])) {
    header("Location: users_create_error.php");
    exit;
}

if (empty($_POST['lastname'])) {
    header("Location: users_create_error.php");
    exit;
}

if (empty($_POST['email'])) {
    header("Location: users_create_error.php");
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: users_create_error.php");
    exit;
}

if (strlen($_POST['password']) < 8) {
    header("Location: users_create_error.php");
    exit;
}

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role      = $_POST['role'];
$address   = $_POST['address'];
$city      = $_POST['city'];
$is_active = $_POST['is_active'];

$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, role, address, city, is_active) VALUES (:email, :password, :firstname, :lastname, :role, :address, :city, :is_active)");
$result = $stmt->execute([
    'email' => $email,
    'password' => $password,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'role' => $role,
    'address' => $address,
    'city' => $city,
    'is_active' => $is_active
]);

if (!$result) {
    header("Location: users_create_error.php");
    exit;
}

$user_id = $conn->lastInsertId();
$backgroundColor = $_POST['backgroundColor'];
$font = $_POST['font'];

$stmt2 = $conn->prepare("INSERT INTO user_settings (user_id, backgroundColor, font) VALUES (:user_id, :backgroundColor, :font)");
$result2 = $stmt2->execute([
    'user_id' => $user_id,
    'backgroundColor' => $backgroundColor,
    'font' => $font
]);

if (!$result2) {
    header("Location: users_create_error.php");
    exit;
}

header("Location: users_create_thankyou.php");
exit;