<?php
$name = "Vivek";
$age = 22;
$skills = array("html","css","js","php");
class car {
    public $name;
    public $year;

    public function displayCar(){
        echo "Brand  : {$this->name} and year is : {$this->year} ";
    }
}

$car = new Car();
$car->name = "BMW";
$car->year = 2026;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <h1> My Name is <?php  echo " " . $name ?> and my Age is <?php echo $age ?></h1>
    <ul>
        <?php foreach ($skills as $value) {  ?>
              <?php echo "<li>" . $value . "</li>" ?>
        <?php } ?>
    </ul>

    <?php echo $car->displayCar() ?>
</body>
</html>