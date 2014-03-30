<?php

class Income
{
	var $amount = "";
	var $repeat = "";
 	var $per6Min = "";
	var $name = "";
	
	function __construct($newAmount, $newRepeat, $name)
	{
		$this->amount = $newAmount;
		$this->repeat = $newRepeat;

		$divisor = 1.0;
		switch($newRepeat)
		{
			case $_SESSION["HOURLY"]:
				$divisor = 10.0;
				break;
			case $_SESSION["DAILY"]:
				$divisor = 240.0;
				break;
			case $_SESSION["WEEKLY"]:
				$divisor = 1680.0;
				break;
			case $_SESSION["MONTHLY"]:
				$divisor = 50400.0;
				break;
			case $_SESSION["YEARLY"]:
				$divisor = 604800.0;
				break;
			default:
				print "You fucked up.";
				break;
		}
		
		$this->per6Min = $this->amount / $divisor;
		
		$this->name = $name;
	}
	
	//Sets the amount this income has earned
	function setAmount($newAmount)
	{
		$this->amount = $newAmount;
	}
	
	//Gets the amount this income has earned
	function getAmount()
	{
		return $this->amount;
	}
	
	function setRepeat($newRepeat)
	{
		$this->repeat = $newRepeat;
	}
	
	function getRepeat()
	{
		return $this->repeat;
	}
	
	function setPer6Min($newPer6Min)
	{
		$this->per6Min = $newPer6Min;
	}
	
	function getPer6Min()
	{
		return $this->per6Min;
	}

	function setName($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}
}

?>
