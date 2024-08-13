<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "my_database";

$db = mysqli_connect($server,$username,$password,$db_name);

if(mysqli_error($db)){
    echo "Connection Error";
    die;
}

function AddUser($name,$email,$mobile,$state,$gender){
    global $db;
    $query = "insert into userdata (name, email, mobile, state, gender) values('$name','$email','$mobile','$state','$gender')";
    $result = mysqli_query($db,$query);
    if($result > 0){
        return true;
    }
    else{
        return false;
    }
}

function GetUsers(){
    global $db;
    $query = "select * from userdata";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

}

function GetUser($id){
    global $db;
    $query = "select * from userdata where id='$id'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
        return mysqli_fetch_assoc($result);
    }

}


function EditUser($id,$name,$email,$mobile,$state,$gender){
    global $db;
    $query = "update userdata set name='$name', email='$email', mobile='$mobile',state='$state',gender='$gender' where id='$id'";
    $result = mysqli_query($db,$query);
    if($result > 0){
        return true;
    }
    else{
        return false;
    }

}

?>