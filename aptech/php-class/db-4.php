<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','aptech');

$query = "select * from student" ;

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)>0){
    echo "Success<br>";
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($records as $record){
        echo $record['student_id'] . "<br>";
        echo $record['student_name'] . "<br>";
        echo "<hr>";
    }
}
else{
    echo "Failed";
}
?>