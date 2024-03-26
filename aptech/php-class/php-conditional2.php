<?php 
$sp = 10000;
$cp = 2000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Conditional statement</title>
</head>
<body>
    <?php if($sp>$cp){ ?>
        <span style= "color:green">Profit</span>
    
    <?php } else { ?>
        <span style= "color:Red">Loss</span>
    <?php  } ?>
    
</body>
</html>