<?php

class Expense
{

	var $repeat = 0;
	var $amount = 0;
	var $priority = 0;
	var $name = "";
	var $amountPaid = 0;

	function __construct($amount, $priority, $repeat, $name)
	{

		$this->amount = $amount;
		$this->priority = $priority;
		$this->repeat = $repeat;
		$this->name = $name;
		$this->amountPaid = 0;
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
	
	function getAmountPaid(){
		return $this->amountPaid;
	}
	
	function paidOff()
	{
		return $this->amountPaid == $this->amount;
	}
	
	function makePayment($amount)
	{
		$this->amountPaid = $this->amountPaid + $amount;
		
		//$this->amount = $this->amount - $amount;
	}
}

?>
