<?php

$id=3;

$con=new mysqli('localhost','root','','dummy');
$stmt="select * from student where id>?";
$ps=$con->prepare($stmt);
$ps->bind_param('i', $id);
$ps->bind_result($id,$name,$course,$fees);
$ps->execute();


while($ps->fetch())
{
	echo $id . "<br>";
	echo $name . "<br>";
}


?>