<?php
include_once("connec.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["multi_active"])) {
        // Handle Set As Active action
        if(isset($_POST['selected_users'])) {
            foreach($_POST['selected_users'] as $id) {
                // / Perform action to set the user as active
                $user_id = mysqli_real_escape_string($db, $id);
                
                // Update the status column to 'active' for the selected user
                $sql = "UPDATE userdetails SET status = 'Active' WHERE id = '$user_id'";
                
                if (mysqli_query($db, $sql)) {
                    // Success message or further processing
                } else {
                    // Error message if the query fails
                    echo "Error updating record: " . mysqli_error($db);
                }
            }
        }
    } 
    if (isset($_POST["mark_delete"])) {
        // Handle Mark as Deleted action
        if(isset($_POST['selected_users'])) {
            foreach($_POST['selected_users'] as $id) {
                // Perform action to mark the user as deleted
            }
        }
    } 
    if (isset($_POST["multi_delete"])) {
        // Handle Permanent Delete action
        if(isset($_POST['selected_users'])) {
            foreach($_POST['selected_users'] as $id) {
                // Perform action to permanently delete the user
            }
        }
    }
}

header("location:user-list.php")
?>
