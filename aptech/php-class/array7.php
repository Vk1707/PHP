<?php

use Illuminate\Support\Arr;

$students =  [
        ["id"=>"1" ,"name"=>"vivek","course"=>"HTML","email"=>"vivek@mail.com"],
        ["id"=>"2" ,"name"=>"Yogita","course"=>"HTML","phone"=>93996969545],
        ["id"=>"3" ,"name"=>"Sachin","course"=>"JAVA","phone"=>8700967004],
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
<h1> Students List</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Students</th>
        <th>Course</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

<?php foreach($students as $student){ ?>
<tr>    
    <td><?= $student["id"]??"_" ?></td>
    <td><?= $student["name"] ?></td>
    <td><?= $student["course"] ?></td>
    <td><?= $student["email"]??"-" ?></td>
    <td><?= $student["phone"]??"-" ?></td>
</tr>    
       <?php } ?>
</table>

<?php 
echo phpversion()."<br>";
ECHO phpversion()."<br>"; 
EcHo phpversion(). "<br>";

$txt = "Programming";

echo "<h1>I Love " . $txt . "</h2>";
echo "<h1>I Love  {$txt} </h2>";

$cars = array(
    "sedan" => array("verna","bmw","audi"),
    "sports" => array("porsche","lamborghni"),
    "suv" => array("thar","G-wagon")
);

echo "<h3>Sedan Car is {$cars['sedan'][0]} , {$cars['sedan'][1]} </h3>";
echo "<h3>Sport Car is {$cars['sports'][0]} , {$cars['sports'][1]} </h3>";
echo "<h3>Suv Car is {$cars['suv'][0]} , {$cars['suv'][1]} </h3>";

print_r($cars);
echo "<br>";
foreach($cars as $car => $car1){
    echo "<h2>{$car} cars are ";
    foreach($car1 as $cname){
        echo "$cname,\n  ";
    }
}
echo"<br>";


$x = 5;
$y = 15;
function myTest() {
    static $x = 5;
    --$x;
    echo $x . "<br>";
}
myTest();
myTest();
myTest();
// echo"<br>";  


function mytest1(){
    global $txt, $x, $y;
    echo"Sum Of X + Y = ". $GLOBALS['x'] + $GLOBALS['y'] . "<br>";
    echo"Sum Of X + Y = ". $x + $y . "<br>";
    echo "{$GLOBALS['txt']}" ."<br> ";
}

mytest1();
echo "$txt" . "<br>";
?>
</body>
</html>