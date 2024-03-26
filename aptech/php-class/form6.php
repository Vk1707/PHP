<?php

/*Check if form is submitted by the user*/
// if(isset($_POST['submitted'])){
//     Form is submitted by the user, process data here
// }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form3</title>
</head>

<body>
    <?php if(isset($_POST['submitted'])) { ?>
        <h1> Welcome <?= $_POST['name'];?></h1>
        <h1> Email Id <?= $_POST['email'];?></h1>
        <h1> Age <?= $_POST['age'];?></h1>
        <h1> Gender <?= $_POST['gender'];?></h1>
        <h1> City <?= $_POST['city'];?></h1>
    <?php } else { ?>    
    <fieldset>
        <form method="post">
          <input type="hidden" name="submitted" value="true">  
          Name :  <input type="text" name="name" placeholder="Enter Name"> <br>
          Email :  <input type="email" name="email"  placeholder="Enter Email Id "> <br>
          Age :  <input type="number" name="age" placeholder="Enter Age" value="Enter Age"> <br>
          Gender :  <input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female <br>
          City :  <select name="city">
                <option>Select City</option>
                <option>New Delhi</option>
                <option>Mumbai</option>
                <option>Chennai</option>
            </select> <br>
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>
    <?php } ?>

</body>

</html>