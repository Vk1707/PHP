<?php

//OOP : Abstract Class Example.
        // Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.
        // An abstract class is a class that contains at least one abstract method. 
        // An abstract method is a method that is declared, but not implemented in the code.
        // An abstract class or method is defined with the abstract keyword:
        // Object of Abstract classes can not be instansciated/created
abstract class Customer
{
	private $name;
	private $accountNo;
	private $branch;
    private $email;
    private $phone;

	public function __construct($accountNo, $name,$branch,$email,$phone)
	{
		$this->name=$name;
		$this->accountNo=$accountNo;
		$this->branch=$branch;
		$this->email=$email;
        $this->phone=$phone;
	}

    public function GetName(){
        return $this->name;
    }
    public function GetAccountNo(){
        return $this->accountNo;
    }
    public function GetBranch(){
        return $this->branch;
    }
    public function GetEmail(){
        return $this->email;
    }
    public function GetPhone(){
        return $this->phone;
    }

    //Setter

    public function SetName($name){
        $this->name = $name;
    }
    public function SetBranch($branch){
        $this->name = $branch;
    }
    public function SetEmail($email){
        $this->name = $email;
    }
    public function SetPhone($phone){
        $this->name = $phone;
    }
}

$customer = new Customer(12345678, "Vivek", "Rohini", "vivek@gmail.com", 9898989898);

echo $customer->GetAccountNo() . "<br>";
echo $customer->GetName() . "<br>";
echo $customer->GetBranch() . "<br>";
echo $customer->GetEmail() . "<br>";
echo $customer->GetPhone() . "<br>";

?>