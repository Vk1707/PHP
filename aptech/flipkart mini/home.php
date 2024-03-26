<?php
$products = [
    ["image"=>"assets/images/gt.jpg","name"=>"Realme" ,"rating"=>"Rating = 4.3","price"=>"Price = 9999"],
    ["image"=>"assets/images/iqoo.jpg","name"=>"IQOO" ,"rating"=>"Rating = 4.3","price"=>"Price = 9999"],
    ["image"=>"assets/images/lava.jpg","name"=>"LAVA" ,"rating"=>"Rating = 4.3","price"=>"Price = 9999"],
    ["image"=>"assets/images/oppo.jpg","name"=>"OPPO" ,"rating"=>"Rating = 4.3","price"=>"Price = 9999"],
    ["image"=>"assets/images/vivo.jpg","name"=>"VIVO" ,"rating"=>"Rating = 4.3","price"=>"Price = 9999"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">    
    <?php foreach($products as $product){ ?>
        <div class="product">   
            <img src="<?= $product['image'] ?>">
            <h3 class="name"><?= $product["name"] ?></h3>
            <span class="rating"><?= $product["rating"] ?></span>
            <h3 class="price"><?= $product["price"] ?></h3>
        </div>
    <?php } ?>    
    </div>
</body>
</html>