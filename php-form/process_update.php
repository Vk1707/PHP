<?php
include_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    // Update user details in the database
    $sql = "UPDATE users SET name='$name', email='$email', mobile='$mobile', gender='$gender', city='$city' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully.";
    } else {
        echo "Error updating user details: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
