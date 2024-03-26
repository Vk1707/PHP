<?php

//Function Overriding

class Bank{
	private $acno;
	private $name;
	private $balance;

	public function Input($acno,$name,$balance){
		$this->acno=$acno;
		$this->name=$name;
		$this->balance=$balance;
	}

	public function Output(){
		echo "Account Number : " . $this->acno . "<br>";
		echo "Name : " . $this->name . "<br>";
		echo "Balance : " . $this->balance . "<br>";
	}
}

class BankV1 extends Bank
{
	private $aadhar;

	public function Input($acno,$name,$balance,$aadhar=0){
		Bank::Input($acno,$name,$balance);
		$this->aadhar=$aadhar;
	}

	public function Output(){
		Bank::Output();
		echo "Aadhar : " . $this->aadhar . "<br>";
	}
}

class BankV2 extends BankV1{
	private $upi;

	public function Input($acno,$name,$balance,$aadhar=0,$upi=0){
		BankV1::Input($acno,$name,$balance,$aadhar);
		$this->upi=$upi;
	}

	public function Output(){
		BankV1::Output();
		echo "UPI : " . $this->upi . "<br>";
	}
}

$cust=new BankV2();

$cust->Input(12345,"Girish",50000,23444423434,'girish@icici');
$cust->Output();

?>