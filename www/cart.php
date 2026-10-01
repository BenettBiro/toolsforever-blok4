<?
session_start();
require 'database.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM cart WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>