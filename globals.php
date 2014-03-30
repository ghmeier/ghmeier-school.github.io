<?php

class Globals{
	var $incomes = array();
	var $numIncomes = 0;

	var $expenses = array();
	var $numExpenses = 0;
	var $timer = 0;
	var $totalMoney = 0;
	
	function __construct() {
		$_SESSION["DELAY"] = 6000;
		$_SESSION["NONE"] = 0;
		$_SESSION["HOURLY"] = 1;
		$_SESSION["DAILY"] = 2;
		$_SESSION["WEEKLY"] = 3;
		$_SESSION["MONTHLY"] = 4;
		$_SESSION["YEARLY"] = 5;
		$this->timer = time();
	}
	function addIncome($income){
		$this->incomes[] = $income;
		$this->numIncomes = $this->numIncomes + 1;
	}
	
	function addExpense($expense){
		$this->expenses[] = $expense;
		$this->numExpenses = $this->numExpenses + 1;
		
		$this->expenses = $this->bubbleSort($this->expenses);
	}
	
	function waitDone(){
		return $this->timer + $_SESSION["DELAY"] < time();
	}
	
	function updateTime(){
		$this->timer = time();
	}
	
	function bubbleSort(array $arr)
	{
		$n = $this->numExpenses;
		for ($i = 1; $i < $n; $i++) {
			for ($j = $n - 1; $j >= $i; $j--) {
				if($arr[$j-1]->getPriority() > $arr[$j]->getPriority()) {
					$tmp = $arr[$j - 1];
					$arr[$j - 1] = $arr[$j];
					$arr[$j] = $tmp;
				}
			}
		}
     
		return $arr;
	}
	
	function getIncomes(){
		return $this->incomes;
	}
	
	function getExpenses(){
		return $this->expenses;
	}
	
	function update()
	{
		foreach($this->incomes as $anIncome)
		{
			$this->totalMoney = $this->totalMoney + ($anIncome->getAmount() / 10.0);
		}
		
		for($i = 0; $i < $this->numIncomes; $i = $i + 1)
		{
			$this->totalMoney = $this->totalMoney + ($this->incomes[$i]->getAmount() / 10.0);
			
			//Remove the income from the income array
			if($this->incomes[$i]->getRepeat() == $_SESSION["NONE"])
			{
				print "Removing an income\n";
				for($n = $i; $n < $this->numIncomes; $n = $n + 1)
				{
					$this->incomes[$n] = $this->incomes[$n + 1];
				}
				
				$this->numIncomes = $this->numIncomes - 1;
			}
		}
		
		for($i = 0; $i < $this->numExpenses; $i = $i + 1)
		{
			if($this->expenses[$i]->paidOff())
			{
				continue;
			}
			
			if($this->totalMoney >= $this->expenses[$i]->getAmount())
			{
				$amountPaid = $this->expenses[$i]->getAmount();
				$this->expenses[$i]->makePayment($amountPaid);
				$this->totalMoney = $this->totalMoney - $amountPaid;
			}
			elseif($this->totalMoney > 0)
			{
				//Didn't have enough money to pay off in full
				$this->expenses[$i]->makePayment($this->totalMoney);
				$this->totalMoney = 0;
			}
		
			if($this->totalMoney == 0)
			{
				//No money left, can't make any more payments
				break;
			}
		}
	}
}

?>
