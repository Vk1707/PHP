<?php

class Bank{
	private $acno;
	private $name;
	private $balance;

	public function InputBank($acno,$name,$balance){
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

	public function InputBankV1($aadhar){
		$this->aadhar=$aadhar;
	}

	public function OutputBankV1(){
		echo "Aadhar : " . $this->aadhar . "<br>";
	}
}

class BankV2 extends BankV1{
	private $upi;

	public function InputBankV2($upi){
		$this->upi=$upi;
	}

	public function OutputBankV2(){
		echo "UPI : " . $this->upi . "<br>";
	}
}

$cust=new BankV2();
$cust->InputBank(12345,"Girish",50000);
$cust->InputBankV1(5435354345);
$cust->InputBankV2('girish@icici');
$cust->OutputBank();
$cust->OutputBankV1();
$cust->OutputBankV2();

?>