<?php
// Include the database connection
require 'db.php';

// Fetch data for the reports
$totalBeds = $pdo->query("SELECT COUNT(*) FROM beds")->fetchColumn();
$occupiedBeds = $pdo->query("SELECT COUNT(*) FROM beds WHERE status = 'occupied'")->fetchColumn();
$availableBeds = $totalBeds - $occupiedBeds;

$totalVaccines = $pdo->query("SELECT COUNT(*) FROM vaccines")->fetchColumn();
$availableVaccines = $pdo->query("SELECT COUNT(*) FROM vaccines WHERE status = 'available'")->fetchColumn();

$recentVisitors = $pdo->query("SELECT * FROM visitors ORDER BY visit_date DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file here -->
</head>
<body>
    <header>
        <h1>Hospital Reports</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="beds.php">Manage Beds</a></li>
                <li><a href="vaccines.php">Manage Vaccines</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Reports Overview</h2>

        <!-- Bed Usage Report -->
        <section>
            <h3>Hospital Bed Usage</h3>
            <p>Total Beds: <?php echo $totalBeds; ?></p>
            <p>Occupied Beds: <?php echo $occupiedBeds; ?></p>
            <p>Available Beds: <?php echo $availableBeds; ?></p>
        </section>

        <!-- Vaccine Availability Report -->
        <section>
            <h3>Vaccine Availability</h3>
            <p>Total Vaccines: <?php echo $totalVaccines; ?></p>
            <p>Available Vaccines: <?php echo $availableVaccines; ?></p>
        </section>

        <!-- Recent Visitors -->
        <section>
            <h3>Recent Visitors</h3>
            <table border="1" cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>Visitor Name</th>
                        <th>Visit Date</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentVisitors as $visitor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($visitor['name']); ?></td>
                            <td><?php echo htmlspecialchars($visitor['visit_date']); ?></td>
                            <td><?php echo htmlspecialchars($visitor['purpose']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Hospital Management System. All rights reserved.</p>
    </footer>
</body>
</html>
