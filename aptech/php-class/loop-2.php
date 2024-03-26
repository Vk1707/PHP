<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .rating{
            width: 500px;
            display: flex;
            justify-content: space-between;
        }
        .rating-item{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .rating-item span{
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="rating">    
        <?php for($i=1;$i<=10;$i++) { ?>
        <div class=rating-item>
        <input type="radio">
            <span><?= $i ?></span>    
        </div>    
        <?php } ?>  
    </div>       
</body>
</html>