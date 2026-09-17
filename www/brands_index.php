<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM brands";
$stmt = $conn->query($sql);
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);


require 'header.php';
?>

<main>
    <div class="container">
        <h1>Brands</h1>
    </div>
    <div class="container">
        <?php foreach ($brands as $brand) : ?>
            <div class="brand-info">
                <img src="<?php echo isset($brand['brand_image']) ? 'images/' . $brand['brand_image'] : 'https://placehold.co/200' ?>" alt="<?php echo htmlspecialchars($brand['brand_name']) ?>">
                <h3><?php echo htmlspecialchars($brand['brand_name']) ?></h3>
                <a href="brands_update.php?id=<?= $brand['brand_id'] ?>">Bewerken</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php' ?>