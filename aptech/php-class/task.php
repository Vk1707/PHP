<?php
    function printRecord($name='',$gender='',$age='',$mobile='',$email=''){
       if($name=='' || $gender=='' || $age==''|| $mobile=='' || $email==''){ 
           echo 'nothing to display';
           return;
       }
       if(!empty($name)){
            echo $name . "<br>";
       }
       if(!empty($gender)){
            echo $gender . "<br>";
       }
       if(!empty($age)){
            echo $age . "<br>";
       }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       printRecord("Male");
    ?>
    
</body>
</html>