<?php
//Check if form data is submitted
$id = $_GET['id'];

$con = mysqli_connect('localhost','root','','flipkart');
$query = "delete from product where id ='$id'";
$result = mysqli_query($con, $query);

// if($result>0){
//     header("location:db-5.php?message=Record deleted successully");
// }
?>