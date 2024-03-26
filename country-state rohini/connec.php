<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "country_state";

try{
    $db = mysqli_connect($server,$user,$password,$database);
    if(mysqli_error($db)){
        echo "connection error";
        die;
    }
}catch(Exception $e){
    echo "An Error Has Occured";
    die;
}


function GetCountries(){
    global $db;
    $query = "select * from country";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    else{
       return [];
    }    
}

?>