<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "employee_records";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8 (optional)
$conn->set_charset("utf8");
?>
