<?php
$arr = [
    [11,22,33],
    [44,55,66],
    [77,88,99]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARRAY - 3</title>
</head>
<body>
Method 1 :

<?php
    echo "<br>";
    echo $arr[0][0] ."<br>";
    echo $arr[0][1] ."<br>";
    echo $arr[2][2] ."<br>";
?>

Method 2 :

<?php   echo "<br>";        
        for($i=0;$i<3;$i++){
            for($j=0;$j<3;$j++){
                echo $arr[$i][$j] ;
                echo "<br>";
            }
        }
    
?>

Method 3 :
<br>
<?php   echo "<br>";  
        foreach($arr as $row){
            foreach($row as $col){
                echo $col ;
                echo "<br>";
            }
        }
?>

    
</body>
</html>