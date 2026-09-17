<?php require 'session_check.php' ?>
<?php require 'header.php'; ?>
<?php require 'database.php'; ?>

<?php
if ($_SESSION['role'] != 'administrator') {
    echo "You are not allowed to view this page, please login as administrator";
    exit;
}



$sql = [];
$query = "SELECT COUNT(id) AS total FROM users";
$stmt = $conn->query($query);
$users = $stmt->fetch(PDO::FETCH_ASSOC);
array_push($sql, $query);

$query = "SELECT COUNT(id) AS total FROM users WHERE role = 'employee'";
$stmt = $conn->query($query);
$employees = $stmt->fetch(PDO::FETCH_ASSOC);
array_push($sql, $query);

$query = "SELECT COUNT(tool_id) AS total FROM tools";
$stmt = $conn->query($query);
$tools = $stmt->fetch(PDO::FETCH_ASSOC);
array_push($sql, $query);


?>

<main class="dashboard">
    <h1>Dashboard</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Welkom <?php echo $_SESSION['firstname'] ?></h2>
                <p>Je bent ingelogd als <?php echo $_SESSION['role'] ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-group">
                <h2 for="">Totaal aantal gebruikers</h2>
                <p><?php echo $users['total'] ?></p>
            </div>
            <div class="card-group">
                <h2 for="">Totaal aantal medewerkers</h2>
                <p><?php echo $employees['total'] ?></p>
            </div>
            <div class="card-group">
                <h2 for="">Totaal aantal soorten gereedschap</h2>
                <p><?php echo $tools['total'] ?></p>
            </div>
        </div>
    </div>
</main>

<?php require 'footer.php' ?>