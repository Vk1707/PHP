<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
$con = mysqli_connect('localhost','root','','flipkart');

$query = "update product set price='40000' where id=1";

$result = mysqli_query($con, $query);

if($result>0){
    echo "Success";
}else{
    echo "Failed";
}
?>