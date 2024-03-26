<?php 
session_start();
// print_r($_SESSION);
include "./config.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['submit'])){



$ans1 = $_POST['q1'];
$ans2 = $_POST['q2'];
$ans3 = $_POST['q3'];
$ans4 = $_POST['q4'];
$ans5 = $_POST['q5'];
$ans6 = $_POST['q6'];
$ans7 = $_POST['q7'];
$ans8 = $_POST['q8'];
$ans9 = $_POST['q9'];
$ans10 = $_POST['q10'];
$ans11 = $_POST['q11'];
$ans12 = $_POST['q12'];
$ans13 = $_POST['q13'];
$ans14 = $_POST['q14'];
$ans15 = $_POST['q15'];




$empid=$_SESSION['userid'];
$adname=$_SESSION['adname'];




$ques_array = ["q1" => $ans1, "q2" => $ans2, "q3" => $ans3, "q4" => $ans4, "q5" => $ans5, "q6" => $ans6, "q7" => $ans7, "q8" => $ans8, "q9" => $ans9, "q10" => $ans10, "q11" => $ans11, "q12" => $ans12, "q13" => $ans13, "q14" => $ans14, "q15" => $ans15];


$ques_array=serialize($ques_array);


$check_user="SELECT * FROM `sc_test` WHERE empid=$empid";


$check_user_run = $conn->query($check_user);


if($check_user_run){
		
$rows= mysqli_num_rows($check_user_run);
if($rows>0)
{

echo "<script>alert('Test atready Submitted')</script>";
exit();
}

else{


$sql= "INSERT INTO sc_test (empid, empname, que_array) VALUES ('$empid', '$adname', '$ques_array')";


$sql_run= $conn->query($sql);
if($sql_run){
echo "<script>alert('Test Submitted')</script>";

}




}

}




}

}

?>