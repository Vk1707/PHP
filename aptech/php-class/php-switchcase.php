<?php 
$day=5;
$dayName= '';
switch($day){
    case 1:
        $dayName="Sunday";
        break;
    case 2:
        $dayName="Monday";
        break;
    case 3:
        $dayName="Tuesday";
        break;
    case 4:
        $dayName="Wednesday";
        break;
    case 5:
        $dayName="Thursday";
        break;
    case 6:
        $dayName="Friday";
        break; 
    case 7:
        $dayName="Saturday";
        break;
    default:
        $dayName="Inavalid Day";    
}
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
    <h1> DAY : <?php echo $dayName; ?> </h1>
</body>
</html>