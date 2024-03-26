<?php

/*

Static Member 
A static member is a member (variable or function) of class which is not associated with a particular instance/object of the class rather its value can be commonly shared by all instances of the class.

static variable

Key Points:
- The value of a static variable can be commonly shared by all the instances of a class.
- A static variable is declared in the memory as soos as a program starts.
- A static variable cannot be accessed without creating any object of a class. You can access the static variables with the class name itself.
- A static variable remains in the memory for as long as the program is in execution.

*/

class Sample{
	public static $data;

	public function Display(){
		echo "Data : " . Sample::$data . "<br>";
	}
}

//Initializing static variables
Sample::$data=5;

$obj1=new Sample();
$obj2=new Sample();

$obj1->Display();
$obj2->Display();

*/


?>