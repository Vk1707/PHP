<?php
include_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user details from the database
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="male" <?php if($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
<?php
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
