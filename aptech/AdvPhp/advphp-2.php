<?php
class Student
{
	protected $id;
	protected $name;
	protected $course;
	public $fees;

	public function Input($id,$name,$course,$fees)
	{
		$this->id=$id;
		$this->name=$name;
		$this->course=$course;
		$this->fees=$fees;
	}

    //Mutator/Setter
    public function SetName($name){
        //Do Authorization / Validation
        $this->name = $name;
    }

    //Accessor/Getter
    public function GetName(){
        //Do Authorization
        return $this->name;
    }

    //Accessor/Getter
    public function GetCourse(){
        //Do Authorization
        return $this->course;
    }
}


$obj1=new Student();
$obj2=new Student();

$obj1->Input(1,"Ankit","Python",16000);
$obj2->Input(2,"Vivek","Php",15000);

$obj1->SetName("Girish Attri");
echo $obj1->GetCourse();
echo "<br>";
echo $obj2->GetCourse();

?>