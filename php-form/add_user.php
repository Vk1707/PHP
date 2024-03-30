// add_user.php
<?php
include_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    // Your validation code here

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, mobile, gender, city) VALUES ('$name', '$email', '$mobile', '$gender', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
