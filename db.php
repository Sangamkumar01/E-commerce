<?php

// Establish connection to MySQL database
$connection = mysqli_connect('localhost', 'root', 'Sangam@12', 'ecommerce');

// Check connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set SQL mode
$q = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
if ($connection->query($q) === TRUE) {

} else {
    echo "Error setting SQL mode: " . $connection->error . "<br>";
}

?>
