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

// Get user ID from URL parameter
$id = $_GET['id'];

// Fetch user details from the database based on the user ID
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Update User Details</h2>
    <form id="updateForm" method="post" action="process_update.php" enctype="multipart/form-data">
        <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
        <div class='form-group'>
            <label for='name'>Name:</label>
            <input type='text' class='form-control' id='name' name='name' value='<?php echo $row['name']; ?>' required>
        </div>
        <div class='form-group'>
            <label for='email'>Email:</label>
            <input type='email' class='form-control' id='email' name='email' value='<?php echo $row['email']; ?>' required>
        </div>
        <div class='form-group'>
            <label for='mobile'>Mobile:</label>
            <input type='text' class='form-control' id='mobile' name='mobile' value='<?php echo $row['mobile']; ?>' required>
        </div>
        <div class='form-group'>
            <label>Current Profile Image:</label><br>
            <?php if (!empty($row['image'])): ?>
                <img src='uploads/<?php echo $row['image']; ?>' width='100' alt='Current Image'><br>
                Current Image: <?php echo $row['image']; ?>
            <?php else: ?>
                No image available
            <?php endif; ?>
        </div>
        <div class='form-group'>
            <label for='new_image'>New Profile Image:</label>
            <input type='file' class='form-control-file' id='new_image' name='new_image' accept='image/*'>
        </div>
        <div class='form-group'>
            <label for='city'>City:</label>
            <input type='text' class='form-control' id='city' name='city' value='<?php echo $row['city']; ?>' required>
        </div>
        <div class='form-group'>
            <label>Gender:</label><br>
            <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' id='male' name='gender' value='Male' <?php echo $row['gender'] === 'Male' ? 'checked' : ''; ?> required>
                <label class='form-check-label' for='male'>Male</label>
            </div>
            <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' id='female' name='gender' value='Female' <?php echo $row['gender'] === 'Female' ? 'checked' : ''; ?> required>
                <label class='form-check-label' for='female'>Female</label>
            </div>
        </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
<?php
} else {
    echo "User not found";
}

$conn->close();
?>
