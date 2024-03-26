<?php

//Creating Connection Object
$con=new mysqli('localhost','root','','dummy');

//Executing Insert (Raw) Query
$stmt="INSERT INTO STUDENT VALUES(6,'Girish','PHP',16000)";
$con->query($stmt);

?>