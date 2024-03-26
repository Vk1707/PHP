<?php
    function add($data){
        $res=0;
        foreach($data as $value){
            if($value>50){
            $res=$res+$value;
          }
        }  
          return $res;  
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
        $data = [40,65,75,35,55];
        $res=add($data);
        echo $res;
    ?>
</body>
</html>