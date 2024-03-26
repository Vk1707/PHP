<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "flipkart order";

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


// Function for product Table
function AddOrder($phone_name, $order_price, $card_details, $order_date, $delivered_date, $current_status, $profit, $selling_price, $app_name){
    global $db;
    $query = "insert into orders_list (phone_name, order_price, card_details, order_date, delivered_date, current_status, profit, selling_price, app_name) values('$phone_name','$order_price','$card_details','$order_date','$delivered_date','$current_status','$profit','$selling_price','$app_name')";
    $result = mysqli_query($db,$query);
    if($result>0){
        return true;
    }
    else{
       return false;
    }
}

function UpdateOrder($Sno,$phone_name, $order_price, $card_details, $order_date, $delivered_date, $current_status, $profit, $selling_price, $app_name){
    global $db;
    $query = "update orders_list set phone_name='$phone_name',order_price='$order_price',card_details='$card_details',order_date='$order_date',delivered_date='$delivered_date',current_status='$current_status',profit='$profit',selling_price='$selling_price',app_name='$app_name' where s_no='$Sno'";
    $result = mysqli_query($db,$query);
    if($result>0){
        return true;
    }
    else{
       return false;
    }
}

function DeleteProduct($Sno){
    global $db;
    $query = "delete from orders_list where s_no='$Sno'";
    $result = mysqli_query($db,$query);
    if($result>0){
        return true;
    }
    else{
       return false;
    }
}

function GetOrder($Sno){
    global $db;
    $query = "select * from orders_list where s_no='$Sno'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
    else{
       return [];
    }    
}

function GetOrders(){
    global $db;
    $query = "select * from orders_list";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    else{
       return [];
    }    
}

?>