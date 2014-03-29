<?php

class Income
{
	$amount;
	$repeat;
	$per6Min;
	
	function _construct($newAmount, $newRepeat, $newPer6Min)
	{
		$amount = $newAmount;
		$repeat = $newRepeat;
		$per6Min = $newPer6Min;
	}
	
	//Sets the amount this income has earned
	function setAmount($newAmount)
	{
		$amount = $newAmount;
	}
	
	//Gets the amount this income has earned
	function getAmount()
	{
		return $amount;
	}
	
	function setRepeat($newRepeat)
	{
		$repeat = $newRepeat;
	}
	
	function getRepeat()
	{
		return $repeat;
	}
	
	function setPer6Min($newPer6Min)
	{
		$per6Min = $newPer6Min;
	}
	
	function getPer6Min()
	{
		return $per6Min;
	}
}

?>