<?php

class Globals{
	var $incomes = array();
	var $expenses = array();
	var $amountOwned = 0;
	
	
	function _construct() {
		session_start();
		$_SESSION['NONE'] = 0;
		$_SESSION["DAILY"] = 1;
		$_SESSION["MONTHLY"] = 2;
		$_SESSION["YEARLY"] = 3;
	}
	function addIncome($income){
		$this->incomes[] = $income;
	}
	
	function addExpense($expense){
		$this->expenses[] = $expense;
	}
	
	function getIncomes(){
		return $this->incomes;
	}
	
	function getExpenses(){
		return $this->expenses;
	}
	
	

}

?>
