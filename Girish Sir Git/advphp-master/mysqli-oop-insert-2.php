<?php

//Parameterized Query
$con=new mysqli('localhost','root','','dummy');

$id=7;
$name='Ankit';
$course='Java';
$fees=15000;

$stmt="INSERT INTO STUDENT VALUES(?,?,?,?)";
$ps=$con->prepare($stmt);
$ps->bind_param('issi',$id,$name,$course,$fees);
$ps->execute();

?>