<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $interests = implode(", ", $_POST['interests']);
    $select = $_POST['select'];
    $gender = $_POST['gender'];

    // SQL to update user data
    $sql = "UPDATE users SET name='$name', email='$email', mobile='$mobile', interests='$interests', select_option='$select', gender='$gender' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "{alert(Record updated successfully)}";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
header('Location:display.php');

?>
