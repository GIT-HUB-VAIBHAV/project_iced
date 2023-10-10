<?php
include "db_config.php";

if (isset($_GET['recordId'])) {
    $recordId = $_GET['recordId'];

    $sql = "SELECT * FROM form_data WHERE id = $recordId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "Invalid record ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>

<body>
    <h1>Edit Record</h1>
    <form action="update_record.php" method="post">
        <input type="hidden" name="recordId" value="<?php echo $record['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $record['name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $record['email']; ?>" required><br>

        

        <!-- Include other form fields and pre-fill them with existing data -->

        <button type="submit">Update</button>
    </form>
</body>

</html>
