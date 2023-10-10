<?php
include "db_config.php";

$searchQuery = $_GET['searchQuery'];

$sql = "SELECT * FROM form_data WHERE name LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%'";
$result = $conn->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);

$conn->close();
?>