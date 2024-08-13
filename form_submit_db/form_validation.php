<?php
include_once("connec.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];      
    $email = $_POST["Email"];    
    $mobileno = $_POST["Mobileno"];
    $checkval = implode(",", $_POST["checkbox"]);
    $gender = $_POST["Gender"];
    $select = $_POST["optionval"];

    // Check if cropped image data is present
    if (isset($_POST["croppedImage"])) {
        // Handling Cropped Image Data
        $cropped_image_data = $_POST["croppedImage"];

        // Decode the Base64-encoded image data
        $cropped_image_decoded = base64_decode(str_replace('data:image/jpeg;base64,', '', $cropped_image_data));

        // Save the Cropped Image to the server with the original filename
        $upload_folder = "uploads/";
        $cropped_image_name = uniqid() ."_" . $_FILES["Image"]["name"];
        file_put_contents($upload_folder . $cropped_image_name, $cropped_image_decoded);

        // Set the original image name to the cropped image name
        $original_image_name = $cropped_image_name;
    } else {
        // Move the Original Image to the upload folder
        $original_image_tmp = $_FILES["Image"]["tmp_name"];
        $original_image = $_FILES["Image"]["name"];
        $upload_folder = "uploads/";
        $original_image_name = uniqid() . "_" . $original_image;
        move_uploaded_file($original_image_tmp, $upload_folder . $original_image_name);
    }

    // Add user data to the database
    $result = AddUser($name, $email, $mobileno, $checkval, $gender, $select, $original_image_name, $original_image_name);

    // Check the result of the database operation
    if ($result) {
        echo "success";
    } else {
        echo "fail";
    }
}
?>
