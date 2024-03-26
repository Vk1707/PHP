<?php

$con=new mysqli('localhost','root','','dummy');
$stmt="select * from student";
$result=$con->query($stmt);

while($record=$result->fetch_assoc())
{
	var_dump($record);
	echo "<br>";
}


?>