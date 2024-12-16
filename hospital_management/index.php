<?php
// Start session and include database connection
session_start();
require 'db.php';

// Check if the user is logged in (if you add authentication in the future)
// If not, redirect to login.php (for now, assume everyone can access)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your CSS file if you have one -->
</head>
<body>
    <header>
        <h1>Welcome to Hospital Management System</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="beds.php">Manage Beds</a></li>
                <li><a href="vaccines.php">Manage Vaccines</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Welcome!</h2>
        <p>This is the main page for the Hospital Management System Admin Panel. Use the navigation menu to access different sections.</p>
    </main>
    <footer>
        <p>&copy; 2024 Hospital Management System. All rights reserved.</p>
    </footer>
</body>
</html>
