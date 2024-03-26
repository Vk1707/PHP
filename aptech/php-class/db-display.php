<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','flipkart');

$query = "select * from product_category" ;

$result = mysqli_query($con, $query);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html>
    <head>
        <style> 
            table{
                /* width: 100%; */
                border: 1px solid #ddd;
                border-collapse: collapse;
            }

            td{
                border: 1px solid #ddd;
                padding: 5px 10px;

            }
            img{
                height: 200px;
                width: 150px;
                border: 2px dashed blue;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <?php 
            if(isset($_GET['message'])){
                echo "<p>" . $_GET['message'] . "</p>";
            }
        ?>
        <h1>Product list</h1>
        <?php if(count($records)==0) { ?>
            <p>No record found</p>
        <?php } else { ?>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>image</td>

                </tr>
                <?php foreach($records as $record) { ?>
                <tr>
                    <td><?= $record['id'] ?></td>
                    <td><?= $record['name'] ?></td>
                    <td><img src='<?=$record["image"]?>'></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </body>
</html>