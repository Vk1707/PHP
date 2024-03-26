<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','aptech');

$query = "delete from  student where student_id=3" ;

$result = mysqli_query($con, $query);

if($result>0){
    echo "Success";
}else{
    echo "Failed";
}
?>