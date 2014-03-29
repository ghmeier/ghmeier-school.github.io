<?php

class Expense
{
	var $repeat;
	var $amount;
	var $priority;
	var $name;

	function _construct($amount, $priority, $repeat, $name)
       	{
		$this->amount = $amount;
		$this->priority = $priority;
		$this->repeat = $repeat;
		$this->name = $name;
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
}

?>
