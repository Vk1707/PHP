<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "vivek_intern";

$db = mysqli_connect($server,$user,$password,$database);
if(mysqli_error($db)){
    echo "connection error";
    die;
}

function AddUser($name, $email, $mobileno, $checkval, $gender, $select, $image_name){
    global $db;
    $query = "insert into userdetails (name,email,mobileno,language,gender,skill,status,profile_img) values('$name', '$email', '$mobileno','$checkval', '$gender', '$select','No','$image_name')";
    $result = mysqli_query($db,$query);
    if($result > 0){
        return true;
    }
    else{
       return false;
    }
}


function GetUserDetails(){
    global $db;
    $query = "select * from userdetails order by id desc";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) > 0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    } 
}


function GetUser($id){
    global $db;
    $query = "select * from userdetails where id='$id'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
    else{
        return [];
    }    
}

function DeleteUser($id){
    global $db;
    $query = "DELETE FROM userdetails WHERE id=$id";
    $result = mysqli_query($db,$query);
    if($result>0){
        return true;
    }
    else{
        return false;
    }
}

function MarkDelete($id){
    global $db;
    date_default_timezone_set("Asia/Calcutta");
    $timestamp = date("Y-m-d H:i:sa");
    $query = "update userdetails set delete_mark='$timestamp' where id='$id'";
    $result = mysqli_query($db,$query);
    if($result>0){
        return true;
    }
    else{
       return false;
    }
}

function UpdateUser($id,$name, $email, $mobileno, $checkval, $gender, $select, $image){
    global $db;
    $query = "update userdetails set name='$name',email='$email',mobileno='$mobileno',language='$checkval',gender='$gender',skill='$select', profile_img='$image' where id='$id'";
    $result = mysqli_query($db,$query);
    if($result > 0){
        return true;
    }
    else{
        return false;
    }
}

function UpdateStatus($id){
    global $db;
    $query = "update userdetails set status = 'Active' where id = '$id'";
    $result = mysqli_query($db,$query);
    if ($result > 0){
        return true;
    }
    else{
        return false;
    }
}


function GetImg($id){
    global $db;
    $query = "select profile_img from userdetails where id='$id'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
    else{
        return [];
    }    
}