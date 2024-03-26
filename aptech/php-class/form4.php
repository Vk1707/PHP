<?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form4</title>
</head>
<body>
    Name <?= $name ?> <br>
    Email <?= $email ?> <br>
    Age <?= $age ?> <br>
    gender <?= $gender ?> <br>
    city <?= $city ?> <br>
</body>
</html>