<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "employee_records";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$qualification = $_POST['qualification'];
$institute = $_POST['institute'];
$skills = $_POST['skills'];
$experience = $_POST['experience'];

// File upload handling
$uploadDirectory = "uploads/";
$uploadedFileName = $_FILES['resume']['name'];
$uploadedFileTempName = $_FILES['resume']['tmp_name'];
$uploadedFilePath = $uploadDirectory . $uploadedFileName;

if (move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
    // File uploaded successfully, insert data into database
    $sql = "INSERT INTO form_data (name, email, phone, address, qualification, institute, skills, experience, resume_path) 
            VALUES ('$name', '$email', '$phone', '$address', '$qualification', '$institute', '$skills', '$experience', '$uploadedFilePath')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading file";
}

// Close connection
$conn->close();
?>

