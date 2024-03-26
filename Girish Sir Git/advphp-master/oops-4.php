<?php

//Constructors and Destructors

/*
A constructor is a special member function which is used to initialize the data members of a class. A constructor is also called an initializer function. 
A constructor function gets called everytime a new object of a class is created.

Key Points:

1. Constructor function cannot be called explicitly.
2. A constructor function gets called when an object is created of a class.
3. A constructor function can be created with __construct.
4. A constructor function can be parameterized or parameterless.
5. A constructor function cannot return any value.
*/


class Sample
{
	private $a;
	private $b;

	public function __construct($a=0,$b=0){
		$this->a=$a;
		$this->b=$b;
	}

	public function Display(){
		echo "A = " . $this->a . "<br>";
		echo "B = " . $this->b . "<br>";
	}
}


$obj1=new Sample();		//a=0, b=0
$obj2=new Sample(5);	//a=5, b=0
$obj3=new Sample(5,10);	//a=5, b=10

$obj1->Display();
$obj2->Display();
$obj3->Display();



?>