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
    function add($a,$b){
        $sum = $a + $b;
        return $sum;
}

$res = add(5,10);
echo $res;
?>

        <?php
            function header(){
                echo "<h1>ABC Pvt. Ltd.</h1>";
                return;
            }
            header();
        ?>
</body>
</html>