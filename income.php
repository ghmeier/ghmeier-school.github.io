<?php

class Income
{
	var $amount;
	var $repeat;
	var $per6Min;
	var $name;
	
	function _construct($newAmount, $newRepeat, $newPer6Min, $name)
	{
		$this->amount = $newAmount;
		$this->repeat = $newRepeat;
		$this->per6Min = $newPer6Min;
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
