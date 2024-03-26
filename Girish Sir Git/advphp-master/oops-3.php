<?php

class Bank{
	private $acno;
	private $name;
	private $balance;

	public function SetAccountNo($acno){
		$this->acno=$acno;
	}

	public function SetName($name){
		$this->name=$name;
	}

	public function SetBalance($balance){
		if($balance<0){
			$this->balance=$balance;
		}
	}

	public function GetAccountNo(){
		return $acno;
	}

	public function GetName(){
		return $name;
	}

	public function GetBalance(){
		return $balance;
	}

}

$cust=new Bank();

$cust->SetAccount(12345);
$cust->SetName("Ankit");
$cust->SetBalance(50000);

echo "Account Number : " . $cust->GetAccountNo() . "<br>";
echo "Name : " . $cust->GetName() . "<br>";
echo "Balance : " . $cust->GetBalance() . "<br>";

?>