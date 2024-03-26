<?php
$arr = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
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
    <select>
        <option>Select Date</option>
        <?php for($date=1;$date<=31;$date++) { ?>
            <option><?= $date ?> </option>
        <?php } ?>     
    </select>

    <select>
        <option>Select Month</option>
        <?php foreach($arr as $month) { ?>
            <option><?= $month ?> </option>
        <?php } ?>     
    </select>

    <select>
        <option>Select year</option>
        <?php for($year=2022;$year>=1905;$year--) { ?>
            <option><?= $year ?> </option>
        <?php } ?>     
    </select>
</body>
</html>