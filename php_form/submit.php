<?php
// Database connection

use phpDocumentor\Reflection\Location;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$interests = implode(", ", $_POST['interests']);
$select = $_POST['select'];
$gender = $_POST['gender'];

// SQL to insert data into database
$sql = "INSERT INTO users (name, email, mobile, interests, select_option, gender)
        VALUES ('$name', '$email', '$mobile', '$interests', '$select', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location:display.php');
?>
