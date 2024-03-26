<?php
//Check if form data is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $photo = $_FILES['photo'];


    move_uploaded_file($photo['tmp_name'], 'uploads/' . $photo['name']);
    echo "<pre>";
    echo $name . "<br>";
    print_r($photo);
    echo "</pre>";
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-add</title>
</head>

<body>
   
    <fieldset>
        <form method="Post" enctype="multipart/form-data"> 
            Name :  <input type="text" name="name" placeholder="Name"> <br>
            File :  <input type="file" name="photo"  placeholder=""> <br>           
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>