<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>User List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("db_connection.php");

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["mobile"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["city"] . "</td>";
                        echo "<td>";
                        echo "<a href='#' class='btn btn-primary updateBtn' data-id='" . $row["id"] . "'>Update</a> ";
                        echo "<button class='btn btn-danger deleteBtn' data-id='" . $row["id"] . "'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="updateModalBody">
                    <!-- Update form will be loaded here via AJAX -->
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var updateBtns = document.querySelectorAll(".updateBtn");

    updateBtns.forEach(function(btn) {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            var id = this.getAttribute("data-id");
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "update_user.php?id=" + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var updateModal = document.getElementById("updateModal");
                    var modalBody = updateModal.querySelector(".modal-body");
                    modalBody.innerHTML = xhr.responseText;
                    updateModal.classList.add("show");
                    updateModal.style.display = "block";
                    var backdrop = document.createElement("div");
                    backdrop.classList.add("modal-backdrop", "fade", "show");
                    document.body.appendChild(backdrop);
                }
            };
            xhr.send();
        });
    });

    // Close the modal when the close button is clicked
    var closeBtn = document.querySelector(".close");
    closeBtn.addEventListener("click", function() {
        var updateModal = document.getElementById("updateModal");
        updateModal.classList.remove("show");
        updateModal.style.display = "none";
        var backdrop = document.querySelector(".modal-backdrop");
        backdrop.parentNode.removeChild(backdrop);
    });
});
function submitUpdateForm() {
    var form = document.getElementById("updateUserForm");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_update.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response as needed
            console.log(xhr.responseText);
        }
    };
    xhr.send(formData);

    // Prevent the default form submission
    return false;
}


    </script>
</body>
</html>
