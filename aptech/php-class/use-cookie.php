<?php
$name = $_COOKIE['name'];
$city = $_COOKIE['city'];
setcookie('name','vivek');
setcookie('city','New Delhi');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set-Cookie</title>
</head>
<body>
    <?php echo $name  ;
          
          echo $city ;    
    ?>
    
</body>
</html>