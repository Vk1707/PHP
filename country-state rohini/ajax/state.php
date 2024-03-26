<?php
include_once("../connec.php");
 $country_id = $_POST['country_data'];

$state= "SELECT * FROM state where country_id=$country_id";

$state_qry = mysqli_query($db,$state);
// $output ='<option value="">Select State<option/>';
$output='';
while($state_row = mysqli_fetch_assoc($state_qry)){
    // echo $output .='<option value=" '. $state_row['id'].' ">'. $state_row['name'].'<option/>'; 
    $output.="<option value='".$state_row['id']."'>". $state_row['name']."</option>";
}

 echo $output;
