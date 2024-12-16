<?php
require 'db.php';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vaccine_id = $_POST['vaccine_id'];
    $new_stock = $_POST['stock'];
    $stmt = $pdo->prepare("UPDATE vaccines SET stock = ? WHERE id = ?");
    $stmt->execute([$new_stock, $vaccine_id]);
}

$vaccines = $pdo->query("SELECT * FROM vaccines")->fetchAll();
?>

<h2>Manage Vaccine Stock</h2>
<table>
    <thead>
        <tr>
            <th>Vaccine Name</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vaccines as $vaccine): ?>
        <tr>
            <td><?php echo $vaccine['vaccine_name']; ?></td>
            <td><?php echo $vaccine['stock']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="vaccine_id" value="<?php echo $vaccine['id']; ?>">
                    <input type="number" name="stock" value="<?php echo $vaccine['stock']; ?>">
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>
