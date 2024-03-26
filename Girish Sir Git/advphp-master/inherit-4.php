<?php

class Bank{
	private $acno;
	private $name;
	private $balance;

	public function __construct($acno,$name,$balance){
		$this->acno=$acno;
		$this->name=$name;
		$this->balance=$balance;
	}

	public function OutputBank(){
		echo "Account Number : " . $this->acno . "<br>";
		echo "Name : " . $this->name . "<br>";
		echo "Balance : " . $this->balance . "<br>";
	}
}

class BankV1 extends Bank
{
	private $aadhar;

	public function __construct($acno,$name,$balance,$aadhar=0){
		Bank::__construct($acno,$name,$balance);
		$this->aadhar=$aadhar;
	}

	public function OutputBank(){
		Bank::OutputBank();
		echo "Aadhar : " . $this->aadhar . "<br>";
	}
}


$cust=new BankV1(12345,'Ankit',50000,342423423424);
$cust->OutputBank();

?>