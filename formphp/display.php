<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>User Details</h2>
    <a href="index.php" class="btn btn-primary mb-3">Register User</a> <!-- Button to navigate to index.php for user registration -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Interests</th>
          <th>City</th>
          <th>Gender</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
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

        // Fetch data from database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='uploads/" . $row['image'] . "' width='100'></td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["mobile"]."</td>";
            echo "<td>".$row["interests"]."</td>";
            echo "<td>".$row["city"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td><a href='update.php?id=".$row["id"]."' class='btn btn-primary btn-sm'>Update</a> <a href='delete.php?id=".$row["id"]."' class='btn btn-danger btn-sm'>Delete</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No records found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
