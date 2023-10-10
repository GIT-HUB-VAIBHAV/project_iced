<?php
include "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recordId = $_POST['recordId'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Include other form fields as needed and update the corresponding columns in the database

    $sql = "UPDATE form_data SET name='$name', email='$email' WHERE id=$recordId";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_report.php?recordId=$recordId");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>