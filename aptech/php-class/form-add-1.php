<?php
//Check if form data is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $image_name = $image['name'];
    $tmp_name = $image['tmp_name'];
    move_uploaded_file($image['tmp_name'], 'uploads/'.$image['name']);
    
    $con = mysqli_connect('localhost','root','','flipkart');
    $query = "insert into category (name,image) values('$name', 'uploads/$image_name')";
    $result = mysqli_query($con, $query);

}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-add-file</title>
</head>

<body>
   
    <fieldset>
        <form method="Post" enctype="multipart/form-data"> 
                Name :  <input type="text" name="name" placeholder="Name"> <br>
                File :  <input type="file" name="image"  placeholder=""> <br>

                 <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>