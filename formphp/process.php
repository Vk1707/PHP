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

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$interests = implode(", ", $_POST['interests']);
$city = $_POST['city'];
$gender = $_POST['gender'];
// echo "<pre>";

// print_r($interests);
// File upload handling
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$image_size = $_FILES['image']['size'];

// Check if file is selected
if ($image) {
  // Upload directory
  $upload_dir = "uploads/";

  // Generate unique filename
  $image_name = uniqid() . '_' . $image;

  // Move uploaded file to destination directory
  move_uploaded_file($image_tmp, $upload_dir . $image_name);

  // Insert user details into database including image filename
  $sql = "INSERT INTO users (name, email, mobile, interests, city, gender, image)
          VALUES ('$name', '$email', '$mobile', '$interests', '$city', '$gender', '$image_name')";
} else {
  // Insert user details into database without image filename
  $sql = "INSERT INTO users (name, email, mobile, interests, city, gender)
          VALUES ('$name', '$email', '$mobile', '$interests', '$city', '$gender')";
}

// Execute SQL query
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
