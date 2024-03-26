<?php
class Student
{
	public $id;
	public $name;
	public $course;
	public $fees;

	public function Input($id,$name,$course,$fees)
	{
		$this->id=$id;
		$this->name=$name;
		$this->course=$course;
		$this->fees=$fees;
	}

	public function Output()
	{
		echo $this->id . "<br>";
		echo $this->name ;
		echo $this->course;
		echo $this->fees;
	}
}


$obj1=new Student();
$obj2=new Student();

$obj1->Input(1,"Ankit","Python",16000);
$obj2->Input(2,"Vivek","Php",15000);

echo "$obj1->name";
echo"<br>";
echo "$obj2->name";


?>