<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','flipkart');

$query = "select * from product" ;

$result = mysqli_query($con, $query);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html>
    <head>
        <style> 
            table{
                width: 100%;
                border: 1px solid #ddd;
                border-collapse: collapse;
            }

            td{
                border: 1px solid #ddd;
                padding: 5px 10px;
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
                    <td>Brand</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Action</td>
                    <td>Update</td>
                </tr>
                <?php foreach($records as $record) { ?>
                <tr>
                    <td><?= $record['id'] ?></td>
                    <td><?= $record['name'] ?></td>
                    <td><?= $record['description'] ?></td>
                    <td><?= $record['category_id'] ?></td>
                    <td><?= $record['price'] ?></td>
                    <td><a href="form-delete.php?id=<?= $record['id']; ?>">Delete</a></td>
                    <td><a href="form-update.php?id=<?= $record['id']; ?>">Update</a></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </body>
</html>