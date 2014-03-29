<?php

class Expense
{
<<<<<<< HEAD
	var $repeat = 0;
	var $amount = 0;
	var $priority = 0;
	var $name = "";

	function __construct($amount, $priority, $repeat, $name)
       	{
=======
	var $repeat;
	var $amount;
	var $priority;
	var $name;
	var $amountPaid;

	function _construct($amount, $priority, $repeat, $name)
    {
>>>>>>> 615745065db4b2881b5834d96ab10a5ce2b9fc54
		$this->amount = $amount;
		$this->priority = $priority;
		$this->repeat = $repeat;
		$this->name = $name;
<<<<<<< HEAD
		
=======
		$this->amountPaid = 0;
>>>>>>> 615745065db4b2881b5834d96ab10a5ce2b9fc54
	}

	function setAmount($a)
	{
		$this->amount = $a;
	}

	function getAmount()
	{
		return $this->amount;
	}

	function setRepeat($r)
	{
		$this->repeat = $r;
	}

	function getRepeat()
	{
		return $this->repeat;
	}

	function setPriority($p)
	{
		$this->priority = $p;
	}

	function getPriority()
	{
		return $this->priority;
	}

	function setName($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}
	
	function makePayment($amount)
	{
		$this->amountPaid = $this->amountPaid + $amount;
	}
}

?>
