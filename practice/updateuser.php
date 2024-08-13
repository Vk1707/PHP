<?php
include "action.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    
    $res = EditUser($id,$name,$email,$mobile,$state,$gender);
    if ($res) {
        echo "<script>
                alert('User Updated successfully!');
                window.location.href = 'userlist.php';
              </script>";
        // echo "success";
    } else {
        echo "<script>
                alert('Error Updating user. Please try again.');
              </script>";
        // echo "fail";
    }
}

?>