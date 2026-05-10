<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Set charset (important for names like Ahmed, Fatima, etc.)
mysqli_set_charset($conn, "utf8mb4");

?>