<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','aptech');

$query = "select * from student" ;

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
        <h1>Student Result</h1>
        <?php if(count($records)==0) { ?>
            <p>No record found</p>
        <?php } else { ?>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                </tr>
                <?php foreach($records as $record) { ?>
                <tr>
                    <td><?= $record['student_id'] ?></td>
                    <td><?= $record['student_name'] ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </body>
</html>