<?php
$loggedin=true;
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
<?php if ($loggedin) { ?>
    <a href="#"> Welcome User</a> || <a href="#"> Logout</a>
<?php } else{ ?>
    <a href="#"> Login</a> || <a href="#"> Register</a>
<?php } ?>
</body>
</html>