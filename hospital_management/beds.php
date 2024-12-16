<?php
require 'db.php';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $bed_id = $_POST['bed_id'];
    $stmt = $pdo->prepare("UPDATE beds SET status = ?, patient_name = NULL, admission_date = NULL WHERE id = ?");
    if ($status === 'Occupied') {
        $stmt = $pdo->prepare("UPDATE beds SET status = ?, patient_name = ?, admission_date = ? WHERE id = ?");
        $stmt->execute([$status, $_POST['patient_name'], date('Y-m-d'), $bed_id]);
    } else {
        $stmt->execute([$status, $bed_id]);
    }
}

$beds = $pdo->query("SELECT * FROM beds")->fetchAll();
?>

<h2>Manage Hospital Beds</h2>
<table>
    <thead>
        <tr>
            <th>Bed Number</th>
            <th>Status</th>
            <th>Patient Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($beds as $bed): ?>
        <tr>
            <td><?php echo $bed['bed_number']; ?></td>
            <td><?php echo $bed['status']; ?></td>
            <td><?php echo $bed['patient_name']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="bed_id" value="<?php echo $bed['id']; ?>">
                    <select name="status">
                        <option value="Available" <?php echo $bed['status'] === 'Available' ? 'selected' : ''; ?>>Available</option>
                        <option value="Occupied" <?php echo $bed['status'] === 'Occupied' ? 'selected' : ''; ?>>Occupied</option>
                    </select>
                    <input type="text" name="patient_name" placeholder="Patient Name" value="<?php echo $bed['patient_name']; ?>" <?php echo $bed['status'] === 'Available' ? 'disabled' : ''; ?>>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>
