<?php

abstract class Shape
{
	private $fillcolor;
	private $linecolor;

	public function SetFillColor($color){
		$this->fillcolor=$color;
	}

	public function GetFillColor(){
		return $this->fillcolor;
	}

	public function SetLineColor($color){
		$this->linecolor=$color;
	}

	public function GetLineColor(){
		return $this->linecolor;
	}

	public abstract function Draw();
}


class Rectangle extends Shape
{
	private $length;
	private $breadth;

	public function Set($length,$breadth){
		$this->length=$length;
		$this->breadth=$breadth;
	}

	public function GetLength(){
		return $this->length;
	}

	public function GetBreadth(){
		return $this->breadth;
	}

	public function Draw(){
		echo "Rectangle Drawn <br>";
		echo "Dimension : " . $this->length . "X" . $this->breadth . "<br>";
		echo "Fill Color : " . $this->GetFillColor() . "<br>";
		echo "Line Color : " . $this->GetLineColor() . "<br>";
	}
}

$rect=new Rectangle();
$rect->Set(5,10);
$rect->SetFillColor('Orange');
$rect->SetLineColor('Black');
$rect->Draw();

?>






