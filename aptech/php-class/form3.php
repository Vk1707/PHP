<?php

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
    <fieldset>
        <form method="post" action="form4.php">
            <input type="text" name="name" placeholder="Enter Name"> <br>
            <input type="email" name="email"  placeholder="Enter Email Id "> <br>
            <input type="number" name="age" placeholder="Enter Age" value="Enter Age"> <br>
            <input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female <br>
            <select name="city">
                <option>Select City</option>
                <option>New Delhi</option>
                <option>Mumbai</option>
                <option>Chennai</option>
            </select> <br>
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>