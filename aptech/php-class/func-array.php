<?php
    function add($data){
        $res=0;
        foreach($data as $val){
            $res=$res+$val;
        }

        // $sum = count($data) ;
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
        $data = [1,2,3,4,6];
        $res=add($data);
        echo $res;
    ?>
</body>
</html>