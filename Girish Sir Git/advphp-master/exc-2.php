<?php

try
{
	$con=mysqli_connect('localhost','root','','mydb');
}
catch(Exception $exc)
{
	echo "An Error Occured";
}


echo "Program Finished";

?>