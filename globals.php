<?php

class Globals{
	$incomes = new array();
	$expenses = new array();

	define("NONE", 0);
	define("DAILY", 1);
	define("MONTHLY", 2);
	define("YEARLY", 3);
	
	function addIncome($income){
		$incomes[] = $income;
	}
	
	function addExpense($expense){
		$expenses[] = $expense;
	}
	
	function getIncomes(){
		return $incomes;
	}
	
	function getExpenses(){
		return $expenses;
	}
	
	

}

?>
