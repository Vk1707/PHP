<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update User Data</h2>
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

        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            // SQL to retrieve data for the specific user
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Interests:</label><br>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="interest1" name="interests[]" value="Interest 1" <?php if(strpos($row['interests'], 'Interest 1') !== false) echo 'checked'; ?>>
                            <label class="form-check-label" for="interest1">Interest 1</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="interest2" name="interests[]" value="Interest 2" <?php if(strpos($row['interests'], 'Interest 2') !== false) echo 'checked'; ?>>
                            <label class="form-check-label" for="interest2">Interest 2</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="interest3" name="interests[]" value="Interest 3" <?php if(strpos($row['interests'], 'Interest 3') !== false) echo 'checked'; ?>>
                            <label class="form-check-label" for="interest3">Interest 3</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select">Select:</label>
                        <select class="form-control" id="select" name="select">
                            <option value="">Choose an option</option>
                            <option value="Option 1" <?php if($row['select_option'] == 'Option 1') echo 'selected'; ?>>Option 1</option>
                            <option value="Option 2" <?php if($row['select_option'] == 'Option 2') echo 'selected'; ?>>Option 2</option>
                            <option value="Option 3" <?php if($row['select_option'] == 'Option 3') echo 'selected'; ?>>Option 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Gender:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($row['gender'] == 'Male') echo 'checked'; ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if($row['gender'] == 'Female') echo 'checked'; ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <?php
            } else {
                echo "No user found with the provided ID.";
            }
        } else {
            echo "ID parameter is missing.";
        }

        $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>