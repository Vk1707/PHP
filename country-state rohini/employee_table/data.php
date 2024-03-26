<?php
include_once("../employee_table/conc.php");
include_once("../employee_table/index.php");
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$hire_date = $_POST['hire_date'];

$sql ="INSERT INTO employee (fname,lname,hire_date) VALUES ('$first_name','$last_name','$hire_date')";

$sql_qry = mysqli_query($db,$sql);


?>