<?php

//Constructors and Destructors

/*
A destructor is a special member function which is used to de-initialize the data members of a class. 
A destructor is the last function which gets called in the life cycle of an object. 
Key Points:

1. Destructor function cannot be called explicitly.
2. A destructor function gets called when an object is terminated.
3. A destructor function can be created with __destruct.
4. A destructor function is parameterless.
5. A destructor function cannot return any value.
*/


class Sample
{
	function __construct(){
		echo "Object Created<br>";
	}

	function __destruct(){
		echo "Object Terminated<br>";
	}
}

$obj1=new Sample();		
$obj2=new Sample();
?>

