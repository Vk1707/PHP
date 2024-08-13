<?php
include_once("connec.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $name = $_POST["Name"];      
    $email = $_POST["Email"];    
    $mobileno = $_POST["Mobileno"];
    $checkval = implode(",",$_POST["checkbox"]);
    $gender = $_POST["Gender"];
    $select = $_POST["optionval"];
    $user = GetUser($id);

    // File upload handling
    $image = $_FILES["New_Image"]["name"];
    $image_tmp = $_FILES["New_Image"]["tmp_name"];

    // Upload directory
    $upload_folder = "uploads/";

    // Generate unique filename
    $image_name = uniqid() . "_" . $image;

    // Move uploaded file to folder
    move_uploaded_file($image_tmp, $upload_folder . $image_name);

    // Get the old image
    $old_image = $user['profile_img'];

    // Unlink the old image file if a new image is uploaded and the old image exists
    if ($image && file_exists($upload_folder . $old_image)) {
        unlink($upload_folder . $old_image);
        echo"Deleted";
    }

    if($image){
        $result = UpdateUser($id, $name, $email, $mobileno, $checkval, $gender, $select, $image_name);
    }
    else{
        $result = UpdateUser($id, $name, $email, $mobileno, $checkval, $gender, $select, $old_image);
    }
    // Update user information in the database

    if($result){
        // Redirect to user list page or display success message
        header('location:user-list.php');
        exit; // Terminate script execution after redirection
    } else {
        // Handle update failure
        echo "Failed to update user information.";
    }
}
?>
