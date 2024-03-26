<?php

//Getters and Setters

class Flight
{
	private $fno;
	private $destination;
	private $distance;
	private $fuel;

	private function CALFUEL()
	{
		if($this->distance<=1000)
			return 500;
		elseif($this->distance<=2000)
			return 1100;
		else
			return 2200;
	}

	public function SetFlightNo($fno)
	{
		$this->fno=$fno;
	}

	public function SetDestination($destination)
	{
		$this->destination=$destination;
	}

	public function SetDistance($distance)
	{
		$this->distance=$distance;
		$this->fuel=$this->CALFUEL();
	}

	public function GetFlightNo()
	{
		return $this->fno;
	}

	public function GetDistance()
	{
		return $this->distance;
	}

	public function GetDestination()
	{
		return $this->destination;
	}

	public function GetFuel()
	{
		return $this->fuel;
	}
}

if(count($_POST)!=0)
{
	$obj=new Flight();
	$obj->SetFlightNo($_POST['fno']);
	$obj->SetDestination($_POST['destination']);
	$obj->SetDistance($_POST['distance']);

	echo "Destination : " . $obj->GetDestination();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
	<h1>Enter Flight Details</h1>
	<form method='post'>
		Flight No : <input type="text" name="fno"> <br>
		Destination : <input type="text" name="destination"> <br>
		Distance : <input type="text" name="distance"> <br>

		<input type="submit">



	</form>
	</h1>
</body>
</html>