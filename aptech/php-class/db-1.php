<?php
//Database programming in PHP.

//Step 1: Establishing connection to mysql
//mysqli_connect('server','user','password','database');
$con = mysqli_connect('localhost','root','','aptech');

//Step 2: Define SQL query
$query = "insert into student values(6,2,'ajay')";

//Step 3 : Execute the query
//mysqli_query(connection, query);
//mysqli_query responses
/*
    1. for insert : number or error
    2. for update : number or error
    3. for delete : number or error
    4. for select : mysqli_result object or error
*/

$result = mysqli_query($con, $query);

if($result>0){
    //$id = mysqli_insert_id($con);
    echo "Success : $id";
}else{
    echo "Failed";
}
?>