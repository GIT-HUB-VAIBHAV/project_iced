<?php
include "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    parse_str(file_get_contents("php://input"), $deleteData);
    $recordId = $deleteData['recordId'];

    $sql = "DELETE FROM form_data WHERE id = $recordId";

    if ($conn->query($sql) === TRUE) {
        http_response_code(204); // No content (success)
    } else {
        http_response_code(500); // Internal server error (failure)
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
