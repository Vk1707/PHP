<?php

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

	public function FEEDINFO($fno,$dest,$dist)
	{
		$this->fno=$fno;
		$this->destination=$dest;
		$this->distance=$dist;
		$this->fuel=$this->CALFUEL();
	}

	public function SHOWINFO()
	{
		echo "Flight Number : " . $this->fno . "<br>";
	}
}

if(count($_POST)!=0)
{
	$obj=new Flight();
	$obj->FEEDINFO($_POST['fno'],$_POST['destination'],$_POST['distance']);
	$obj->SHOWINFO();
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