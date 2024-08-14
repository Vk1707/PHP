<?php
include("action.php");

$id = $_GET['id'];

if(DeleteUser($id)){
    echo '<script>
        alert("User Deleted Successfully");
        window.location.href = "userlist.php";
    </script>';
} else {
    echo '<script>
        alert("Failed to delete user");
        window.location.href = "userlist.php";
    </script>';
}

?>