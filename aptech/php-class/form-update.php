<?php
$name="";
$brand="";
$category="";
$price="";

//Check if form data is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $price = $_POST['price'];
    
    $con = mysqli_connect('localhost','root','','flipkart');
    $query = "update product set price ='$price' where id ='$id'";
    $result = mysqli_query($con, $query);

    if($result>0){
        header("location:db-5.php?message=Record updated successfully");
    }
    else{
        echo "Record failed!";
    }
} 
else{
    $id = $_GET['id'];

    $con = mysqli_connect('localhost','root','','flipkart');
    $query = "select * from product where id ='$id'";
    $result = mysqli_query($con, $query);
    $record = mysqli_fetch_assoc($result);

    $name=$record['name'];
    $brand=$record['brand'];
    $price=$record['price'];
    $category=$record['category'];
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-update</title>
</head>

<body>
   
    <fieldset>
        <form method="Post"> 
            ID : <input type="number" name="id" value="<?= $id ?>" > <br>
            Brand : <input type="text" name="brand" value="<?= $brand ?>" > <br>
            Category :  <select name="category">
                <option <?php echo ($category=='Basic Phone')?"selected":""; ?>>Basic Phone</option>
                <option <?php echo ($category=='Smartphone')?"selected":""; ?>>Smartphone</option>
                <option <?php echo ($category=='Laptop')?"selected":""; ?>>Laptop</option>
                <option <?php echo ($category=='Tablet')?"selected":""; ?>>Tablet</option>
            </select> <br>
            Price :  <input type="number" name="price" value="<?= $price ?>" placeholder=""> <br>            
            <input type="submit" placeholder="Submit Details">
        </form>
    </fieldset>

</body>

</html>