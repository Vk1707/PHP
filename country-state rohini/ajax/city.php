<?php
include_once("../connec.php");
$state_id = $_POST['state_data'];

$city= "SELECT * FROM city where state_id = $state_id";

$city_qry = mysqli_query($db,$city);
$city_output ='';
 
while($city_row = mysqli_fetch_assoc($city_qry)){
    // $city_output .='<option value="'.$city_row['id'].'">'.$city_row['name'].'<option/>';
    $city_output.="<option value='".$city_row['id']."'>". $city_row['name']."</option>";
}

echo $city_output;
