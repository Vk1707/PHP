<?php
// Check if user ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
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

    // Prepare and execute delete query
    $id = $_GET['id'];
    $sql = "SELECT image FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];
        // Delete image file if it exists
        if (!empty($image)) {
            $file_path = "uploads/" . $image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    $delete_sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Condition is true');</script>";
        header('location:display.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    // Close database connection
    $conn->close();
} else {
    echo "User ID not provided";
}
?>
