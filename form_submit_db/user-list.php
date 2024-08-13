<?php
include_once("connec.php");
$users = GetUserDetails();
$counter = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .userCheckbox{
            border: 1px solid black;
            /* outline: black; */
        }
    </style>

</head>

<body class="bg-info-subtle">
    <div class="container-xxl flex-grow-1 container-p mt-3 ">
        <div class="position-relative text-center bg-primary text-white fw-bold p-1 mb-0">
            <h4 class="fs-2">User List</h4>
            <button class="position-absolute top-0 end-0 btn btn btn-light border-black" style="margin: 10px 5px !important;"><a
                    class="text-decoration-none " href="register_user.php">New User</a></button>
        </div>
            <?php if($users == "") { ?>
                <?php  echo "<table class='table'>";
                        echo "<thead class='bg-dark'>";
                        echo "<td class='text-center'>";
                        echo "No Result";
                        echo "</td>";
                } else { ?>
    0<form method='post' action='controls.php'>
        <table class="lightBorder table table-bordered table-hover m-0">
            <thead class="bg-dark">
                <tr>
                    <th>Check</th>
                    <th>S.No</th>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Mobile No.</th>
                    <th>Gender</th>
                    <th>Language</th>
                    <th>Skill</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
                <tbody class="table-border-bottom-0">
                <?php foreach($users as $user) { if(empty($user['delete_mark'])) { ?>
                <tr style="vertical-align: middle;">
                    <td><input class="form-check-input userCheckbox" type="checkbox" name="checked[]" value="<?= $user['id'] ?>"></td>
                    <td><?= ++$counter .".)" ?></td>
                    <td><img src="uploads/<?= $user['profile_img']?>" alt="Avatar" width="90"></td>
                    <td><?= $user['name'] ?></td>
                    <td>
                        <?= $user['email'] ?>
                    </td>
                    <td >
                        <?= $user['mobileno'] ?>
                    </td>
                    <td>
                        <?= $user['gender'] ?>
                    </td>
                    <td>
                        <?= $user['language'] ?>
                    </td>
                    <td>
                        <?= $user['skill'] ?>
                    </td>
                    <td>
                        <?= $user['status'] ?>
                    </td>
                    <td onclick="return confirmDelete(<?= $user['id'] ?>)" id="deleterecord">
                        <a class="btn btn-outline-danger" href="">Delete</a>
                    </td>
                    <td >
                        <a class="btn btn-outline-primary" href="update-user.php?id=<?= $user['id'] ?>">Update</a>
                    </td>
                </tr>
                <?php } ?>  
                <?php } ?>  
                <?php } ?>
            </tbody>
        </table>
        <div class="bg-primary p-2 text-end" id="actionButtons" style="display: none;">
            <input class="bg-info-subtle btn border-black" type='submit' name='multi_active' value="Set As Active">           
            <input class="bg-info-subtle btn border-black" type='submit' name='no_active' value="Set As No Active">           
            <input class="bg-info-subtle btn border-black" type='submit' name='mark_delete' value="Mark As Deleted">           
            <input onclick="return confirmPermaDelete()" class="bg-info-subtle text-danger btn border-black" type='submit' name='multi_delete' value="Permanent Delete">           
        </div>
    </form>    
    </div>
    <script>
        // Function to toggle action buttons visibility based on checkbox selection
        function toggleActionButtons() {
            let checkboxes = document.querySelectorAll('.userCheckbox');
            let actionButtons = document.getElementById('actionButtons');
            let isChecked = Array.from(checkboxes).some(function (checkbox) {
                return checkbox.checked;
            });

            if (isChecked) {
                actionButtons.style.display = 'block';
            } else {
                actionButtons.style.display = 'none';
            }
        }

        // Add event listener to checkboxes to toggle action buttons
        let checkboxes = document.querySelectorAll('.userCheckbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', toggleActionButtons);
        });

        let deleteR = document.getElementById("deleterecord");
        function confirmPermaDelete(){
            if(confirm("Are you sure you want to delete?")){
                console.log("Deleted")
                return true;
            }
            else{
                console.log("Not Deleted")
                return false;
            }   
        };
        function confirmDelete(userid){
            if(confirm("Are you sure you want to delete?")){
                deleteRecord(userid);
                return true;
            }
            else{
                console.log("Not Deleted")
                return false;
            }   
        };

        // Delete Record Function
        function deleteRecord(userid){
            const url = "delete-user.php?id=" + userid;

            const xhr = new XMLHttpRequest();

            xhr.open("POST", url, true);

            // Send the proper header information along with the request
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = () => {
            // Call a function when the state changes.
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Request finished. Do processing here.
                    alert("Record Deleted Successfully");
                    
                }
            };
            xhr.send();
        }

        // Update Status Function
        function updateStatus(userid){
            const url = "delete-user.php?id=" + userid;

            const xhr = new XMLHttpRequest();

            xhr.open("POST", url, true);

            // Send the proper header information along with the request
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = () => {
            // Call a function when the state changes.
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Request finished. Do processing here.
                    alert("Record Deleted Successfully");
                    
                }
            };
            xhr.send();
        }

    </script>
</body>

</html>
