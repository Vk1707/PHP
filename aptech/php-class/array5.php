<?php
$arr =  [
        ["id"=>"1" ,"name"=>"vivek","course"=>"HTML"],
        ["id"=>"2" ,"name"=>"Yogita","course"=>"HTML"],
        ["id"=>"3" ,"name"=>"Sachin","course"=>"JAVA"],
]
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
Method 1 :

<?php
    echo "<br>";
    echo $arr[0]["id"] ."<br>";
    echo $arr[1]["name"] ."<br>";
    echo $arr[2]["course"] ."<br>";
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