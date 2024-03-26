<?php
    function Interest($p,$r,$t)
    {
        $result=$p*$r*$t/100;
        return $result;
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
        $res = Interest(500,10,2);
        echo $res;
    ?>
    
</body>
</html>