<?php

//Constructor and Destructor in Inheritance
class A
{
	public function __construct(){
		echo "Parent Class Object Created<br>";
	}

	public function __destruct(){
		echo "Parent Class Object Terminated<br>";
	}
}

class B extends A
{
	public function __construct(){
		A::__construct();
		echo "Child Class Object Created<br>";
	}

	public function __destruct(){		
		echo "Child Class Object Terminated<br>";
		A::__destruct();
	}
}


?>

