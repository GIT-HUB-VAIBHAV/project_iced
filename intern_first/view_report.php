<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        .report-container {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        .record-info {
            margin-top: 20px;
        }

        .record-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <?php
        include "db_config.php";

        if (isset($_GET['recordId'])) {
            $recordId = $_GET['recordId'];

            $sql = "SELECT * FROM form_data WHERE id = $recordId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $record = $result->fetch_assoc();
                echo "<h1>Report</h1>";
                echo "<div class='record-info'>";
                echo "<p><strong>Name:</strong> " . $record['name'] . "</p>";
                echo "<p><strong>Email:</strong> " . $record['email'] . "</p>";
                // Include other record fields as needed
                echo "</div>";
            } else {
                echo "Record not found.";
            }
        } else {
            echo "Invalid record ID.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
