<?php
require 'db.php';
require 'header.php';
?>

<h2>Admin Dashboard</h2>
<ul>
    <li>Total Beds: <?php echo $pdo->query("SELECT COUNT(*) FROM beds")->fetchColumn(); ?></li>
    <li>Available Beds: <?php echo $pdo->query("SELECT COUNT(*) FROM beds WHERE status = 'Available'")->fetchColumn(); ?></li>
    <li>Vaccines in Stock: <?php echo $pdo->query("SELECT SUM(stock) FROM vaccines")->fetchColumn(); ?></li>
</ul>

<?php require 'footer.php'; ?>
