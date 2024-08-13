<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user ID is provided
    if (isset($_POST['id']) && !empty($_POST['id'])) {
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

        // Get user ID from form data
        $id = $_POST['id'];

        // Fetch user details from the database based on the user ID
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Get the new image file name if provided
            $newImage = $_FILES['new_image']['name'];
            // Check if a new image is uploaded
            if (!empty($newImage)) {
                // Delete the old image file if it exists
                if (!empty($row['image'])) {
                    $oldImagePath = "uploads/" . $row['image'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                // Upload the new image file
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES['new_image']['name']);
                move_uploaded_file($_FILES['new_image']['tmp_name'], $targetFile);
            }

            // Update user details in the database
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $city = $_POST['city'];
            $gender = $_POST['gender'];

            $updateSql = "UPDATE users SET name='$name', email='$email', mobile='$mobile', city='$city', gender='$gender', image='$newImage' WHERE id=$id";

            if ($conn->query($updateSql) === TRUE) {
                // Redirect to display page after successful update
                header("Location: display.php");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "User not found";
        }

        $conn->close();
    } else {
        echo "User ID not provided";
    }
} else {
    echo "Invalid request";
}
?>
