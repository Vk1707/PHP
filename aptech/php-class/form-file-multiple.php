<?php
//Check if form data is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $photos = $_FILES['photos'];

    foreach($photos['name'] as $index=>$file_name){
        $tmp_name = $photos['tmp_name'][$index];
        move_uploaded_file($tmp_name, 'uploads/' . $file_name);
    }
    
    echo "<pre>";
    echo $name . "<br>";
    print_r($photos);
    echo "</pre>";
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-file-multiple</title>
</head>

<body>
   
    <fieldset>
        <form method="Post" enctype="multipart/form-data"> 
            Name :  <input type="text" name="name" placeholder="Name"> <br>
            File :  <input type="file" name="photos[]"  multiple> <br>           
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>