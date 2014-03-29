<?php

class Expense
{
	var $repeat;
	var $amount;
	var $priority;

	function _construct($amount, $priority, $repeat)
       	{
		$this->amount = $amount
		$this->priority = $priority;
		$this->repeat = $repeat;
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
}

?>
