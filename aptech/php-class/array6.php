<?php
$arr =  [
        ["id"=>"1" ,"name"=>"vivek","course"=>"HTML","Mail"=>"vivek@mail.com"],
        ["id"=>"2" ,"name"=>"Yogita","course"=>"HTML","phone"=>93996969545],
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