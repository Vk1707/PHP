<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Add User</h2>
                <form id="addUserForm" onsubmit="return addUser()">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="city" id="city" placeholder="City">
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>User List</h2>
                <a href="user_list.php" class="btn btn-secondary">View User List</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom Script -->
    <script src="script.js"></script>
</body>
</html>
