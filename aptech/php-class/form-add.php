<?php
//Check if form data is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    
    $con = mysqli_connect('localhost','root','','flipkart');
    $query = "insert into product (name,brand,category,price) values('$name','$brand','$category','$price')";
    $result = mysqli_query($con, $query);

    if($result>0){
        header("location:db-5.php");
    }
    else{
        echo "Record failed!";
    }
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-add</title>
</head>

<body>
   
    <fieldset>
        <form method="Post"> 
            Product Name :  <input type="text" name="name" placeholder="Name"> <br>
            Brand name :  <input type="text" name="brand"  placeholder=""> <br>
            Category :  <select name="category">
                <option>Basic Phone</option>
                <option>Smartphone</option>
                <option>Laptop</option>
                <option>Tablet</option>
            </select> <br>
            Price :  <input type="number" name="price" placeholder=""> <br>            
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>