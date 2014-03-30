<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php require_once("expense.php"); ?>
<?php require_once("income.php"); ?>
<?php require_once("globals.php"); ?>
<?php
session_start();
if(sizeof($_POST)) {
	
	$name = $_POST["name"];
	$income_name = $_POST["income-name"];
	$income_amount = $_POST["income-amount"];
	$income_rate = $_POST["income-rate"];
	$expense_name = $_POST["expense-name"];
	$expense_amount = $_POST["expense-amount"];
	$expense_rate = $_POST["expense-rate"];
	
	$global = new Globals();
	$global->addIncome(new Income($income_amount,$_SESSION[$income_rate],$income_name));
	$global->addExpense(new Expense($expense_amount,0,$_SESSION[$expense_rate],$expense_name));
	setcookie("user", $name);
	setcookie("global", $global);	
}
?>
<html>
	<head>
		<title>9to5</title>
		<link href="9to5Stylesheet.css" rel="stylesheet" type="text/css"/>
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"/>
		<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css"/>
		<script src="script.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		
	</head>
	<body>
		<div id = "container">
			<div id="expenses">
			<?php
				if(isset($_COOKIE["global"])) {
				$global = $_COOKIE["global"];
				 foreach ($global->getExpenses() as $expense) {?>
				<div  class="expense">
					<h4><?= $expense->getName(); ?></h4>
					<div id =<?= "progressbar". $expense->getName() ?> > 
						<div class='label'> <?= "$".$expense->getAmountPaid() ?> </div>
					</div>
					
					<script>
						var name = "#progressbar" + <?= json_encode($expense->getName()) ?>;
						$(name).progressbar({max: <?= json_encode($expense->getAmount()) ?>});
						$(name).progressbar({value: <?= json_encode($expense->getAmountPaid()) ?>});
					</script>
					

				</div>
			<?php } } ?>
			</div>
			
			<div id="balance">
				<?php
				echo $_COOKIE["user"];
				if(!isset($_COOKIE["user"])) { ?>
				<div style="margin-left:30%;margin-top:15%;">	
				<form method="post" action="index.php" name="create" onsubmit="return validateForm()">
					
					<table>
					    <tr>
						<td>
						    <h3 style="display:inline;">Name:</h3>
						</td>
						<td>
						    <input type="text" name="name">
						</td>
					    </tr>
				       </table>
					
				      
				       
				       <h3>Income:</h3>
				       <table>
					    <tr>
						<td>
						    <h4 style="display:inline;">Name:</h4>
						</td>
						<td>
						    <input type="text" name="income-name"><br>
						</td>
					    </tr>
					    <tr>
						<td>
						    <h4 style="display:inline;">Amount:</h4>
						</td>
						<td>
						   <input type="text" name="income-amount"  value="0"><br>
						</td>
					    </tr>
					    <tr>
						<td>
						   <h4 style="display:inline;">Rate:</h4>
						</td>
						<td>
						   <select>
							<option name="income-rate" value="YEARLY">Per Year</option>
							<option name="income-rate" value="MONTHLY">Per Month</option>
							<option name="income-rate" value="WEEKLY">Per Week</option>
							<option name="income-rate" value="DAILY">Per Day</option>
							<option name="income-rate" value="NONE">Once</option>
						    </select>
						</td>
					    </tr>
				       </table>
				       
				       <h3>Expense:</h3>
				       <table>
					    <tr>
						<td>
						    <h4 style="display:inline;">Name:</h4>
						</td>
						<td>
						    <input type="text" name="expense-name"><br>
						</td>
					    </tr>
					    <tr>
						<td>
						    <h4 style="display:inline;">Amount:</h4>
						</td>
						<td>
						   <input type="text" name="expense-amount" value="0"><br>
						</td>
					    </tr>
					    <tr>
						<td>
						   <h4 style="display:inline;">Rate:</h4>
						</td>
						<td>
						   <select>
							<option name="expense-rate" value="YEARLY">Per Year</option>
							<option name="expense-rate" value="MONTHLY">Per Month</option>
							<option name="expense-rate" value="WEEKLY">Per Week</option>
							<option name="expense-rate" value="DAILY">Per Day</option>
							<option name="expense-rate" value="NONE">Once</option>
						    </select>
						</td>
					    </tr>
				       </table>
				       <br><br>
				       <input type="submit" name="submit" value="Submit"> 
				    </form>
				
				<?php } else {
					//Balace GOES HERE
					echo "Balance";
				} ?>
				</div>
 			
			</div>
			
			<div id="add-form">
				
				
			</div>
			
			<div id="income">

			<?php
				if(isset($_COOKIE["global"])) {
				$global = $_COOKIE["global"];
				foreach ($global->getIncomes() as $income) {?>
				<div  class="income">
					<?php echo $income->getName(); ?>
				</div>
			<?php } } ?>

			
			
			

		</div>
		<script type="text/javascript">
    
		function validateForm()
		{
		var r=document.forms["create"]["name"].value;
		var w=document.forms["create"]["expense-name"].value;
		var q=document.forms["create"]["income-name"].value;
		
		if (r==null || r=="" || w==null || w=="" || q==null || q=="" )
		  {
		  alert("The name is not valid");
		  return false;
		  }
		var y=document.forms["create"]["income-amount"].value;
		if (y==null || !y.match(/^\d+/) || parseInt(y) <= 0)
		  {
		  alert("The income amount is not valid");
		  return false;
		  }
		var x=document.forms["create"]["expense-amount"].value;
		if (x==null || !x.match(/^\d+/) || parseInt(x) <= 0)
		  {
		  alert("The expense amount is not valid");
		  return false;
		  }
		  setTimeout(function() { window.location.reload()},10);
		return true;
		}
		
		
	    </script>
	</body>
</html>
