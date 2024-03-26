<?php

/*Check if form is submitted by the user*/
if(isset($_POST['submitted'])){
    //Form is submitted by the user, process data here
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
    <?php if(isset($_POST['submitted'])) { ?>
        <h1> Welcome <?= $_POST['name'];?></h1>
    <?php } else { ?>    
        <form method="POST">
            <input type="hidden" name="submitted" value="true">  
            Name :  <input type="text" name="name"> <input type="submit" value="Submit">
        </form>     
    <?php } ?>
</body>
</html>
