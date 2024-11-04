<?php
// Database connection configuration
global $pdo;
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'root';
$password = 'Sangam@12';

try {
    // Connect to MySQL database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Read the SQL file
    $sqlFilePath = 'ecommerce.sql';
    $sql = file_get_contents($sqlFilePath);

    // Split the SQL file into individual queries based on the semicolon
    $queries = array_filter(array_map('trim', explode(';', $sql)));

    // Start the transaction
    $pdo->beginTransaction();

    // Execute each query
    foreach ($queries as $query) {
        if (!empty($query)) {
            $pdo->exec($query);
        }
    }

    // Commit the transaction
    $pdo->commit();
    echo "Database imported successfully!";
} catch (PDOException $e) {
    // Rollback the transaction if an error occurs
    $pdo->rollBack();
    echo "Failed to import database: " . $e->getMessage();
}

