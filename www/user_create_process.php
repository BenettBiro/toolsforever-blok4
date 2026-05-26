<?php
require 'database.php';

if(empty($_POST['firstname'])){
    header("location: users_create_error.php");
    exit;
}

if(empty($_POST['lastname'])){
    header("location: users_create_error.php");
    exit;
}

if(empty($_POST['email'])){
    header("location: users_create_error.php");
    exit;
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header("location: users_create_error.php");
    exit;
}

if(strlen($_POST['password']) < 8){
    header("location: users_create_error.php");
    exit;
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$address = $_POST['address'];
$city = $_POST['city'];
$is_active = $_POST['is_active'];

$query = "INSERT INTO users (firstname, lastname, email, password, role, address, city, is_active) 
          VALUES ('$firstname', '$lastname', '$email', '$password', '$role', '$address', '$city', '$is_active')";
          
$result = mysqli_query($conn, $query);

if($result){
    header("location: users_create_thankyou.php");
    exit;
} else {
    header("location: users_create_error.php");
    exit;
}
?>