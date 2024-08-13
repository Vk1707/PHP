<?php
include "action.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    
    $res = AddUser($name,$email,$mobile,$state,$gender);
    if ($res) {
        // echo "<script>
        //         alert('User added successfully!');
        //         window.location.href = 'index.html';
        //       </script>";
        echo "success";
    } else {
        // echo "<script>
        //         alert('Error adding user. Please try again.');
        //         window.location.href = 'index.html';
        //       </script>";
        echo "fail";
    }
}

?>