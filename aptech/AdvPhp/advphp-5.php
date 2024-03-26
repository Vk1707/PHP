<?php

//OOP : Inheritance
       
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
        $this->branch = $branch;
    }
    public function SetEmail($email){
        $this->email = $email;
    }
    public function SetPhone($phone){
        $this->phone = $phone;
    }
}

class Saving extends Customer 
{
    private $balance;

    public function __construct($acno, $name, $brand, $email, $phone, $amount)
    {
        parent::__construct($acno, $name, $brand, $email, $phone);
        $this->balance = $amount;
    }

    public function GetBalance(){
        return $this->balance;
    }

    public function Deposit($amount){
        $this->balance = $this->balance + $amount;
    }

    public function Withdraw($amount){
        $this->balance = $this->balance - $amount;
    }
}

$customer1 = new Saving(12345,'Vivek','Rohini','vivek@mail.com',9898989898,1000);

echo $customer1->GetAccountNo() . "<br>";
echo $customer1->GetName() . "<br>";
echo $customer1->GetBranch() . "<br>";
echo $customer1->GetEmail() . "<br>";
echo $customer1->GetPhone() . "<br>";
echo $customer1->GetBalance() . "<br>";


?>