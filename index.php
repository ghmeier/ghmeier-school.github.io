<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php require_once("expense.php"); ?>
<?php require_once("income.php"); ?>
<?php require_once("globals.php"); ?>
<?php
 error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

//session_start();
//session_destroy();
$global = new Globals();
if(sizeof($_POST)) {
	
	$name = $_POST["name"];
	$income_name = $_POST["income-name"];
	$income_amount = intval($_POST["income-amount"]);
	$income_rate = $_POST["income-rate"];
	$expense_name = $_POST["expense-name"];
	$expense_amount = intval($_POST["expense-amount"]);
	$expense_rate = $_POST["expense-rate"];
	
	$global = new Globals();
	$global->addIncome(new Income($income_amount,$_SESSION[$income_rate],$income_name));
	$global->addIncome(new Income(10000,$_SESSION["MONTHLY"],"Scholarships"));
	$global->addIncome(new Income(500,$_SESSION["WEEKLY"],"Web Hosting"));
	$global->addExpense(new Expense($expense_amount,0,$_SESSION[$expense_rate],$expense_name));
	$global->addExpense(new Expense(100,0,$_SESSION["MONTHLY"],"DiningCenter"));
	$global->addExpense(new Expense(60,0,$_SESSION["ONCE"],"VideoGame"));
	$global->addExpense(new Expense(10000,0,$_SESSION["YEARLY"],"TacoBell"));
	$_SESSION["user"] =  $name;
	$_SESSION["global"] =  $global;
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
			<div id = "header">
				<img src="images/9to5.png" style="display:block; margin-left:auto;margin-right:auto;"/>
			</div>
			<div id="expenses">
			<h1> Expenses</h1>
				<?php
				if(isset($_SESSION["global"])) {
				//$global = $_SESSION["global"];
				$global->update();
				 foreach ($global->getExpenses() as $expense) {?>
				<div  class="expense">
					<h4><?= $expense->getName() ?></h4>
					<div id =<?= "progressbar". $expense->getName() ?> > 
						<div id = "label" class= <?= json_encode("label".$expense->getName()) ?> > <?= "$".json_encode($expense->getAmountPaid())."/$".json_encode($expense->getAmount()) ?> </div>
					</div>
					
					<script>
						var name = "#progressbar" + <?= json_encode($expense->getName()) ?>;
						$(name).progressbar({max: <?= json_encode($expense->getAmount()) ?>});
						$(<?= json_encode(".label".$expense->getName()) ?>).progressbar({value: <?= json_encode($expense->getAmountPaid()) ?>});
					</script>
					

				</div>
			<?php }  } ?>
			</div>
			
			<div id="balance">
				<?php
				//echo $_SESSION["user"];
				if(!isset($_SESSION["user"])) { ?>
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
						   <select name = "income-rate">
							<option  value="YEARLY">Per Year</option>
							<option  value="MONTHLY">Per Month</option>
							<option  value="WEEKLY">Per Week</option>
							<option  value="DAILY">Per Day</option>
							<option  value="NONE">Once</option>
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
						   <select name = "expense-rate">
							<option  value="YEARLY">Per Year</option>
							<option  value="MONTHLY">Per Month</option>
							<option  value="WEEKLY">Per Week</option>
							<option  value="DAILY">Per Day</option>
							<option  value="NONE">Once</option>
						    </select>
						</td>
					    </tr>
				       </table>
				       <br><br>
				       <input type="submit" name="submit" value="Submit"> 
				    </form>
				
				<?php } else {
					/*Balance GOES HERE*/
					
					echo "<div id='balanceText'>Balance\n$9,001</div>";
					
				} ?>
				</div>

			<div id="income">
	<h1>Incomes</h1>
				<?php
				if(isset($_SESSION["global"])) {
				$global = $_SESSION["global"];
				foreach ($global->getIncomes() as $income) {?>
				<div  class="income">
					<?php echo $income->getName()."\n $".number_format((float)$income->getPer6min(), 2, '.', '')." per 6 minutes" ?>
				</div>
				<?php } } ?>
			</div>	
				
			<div id="add-form" style="float:left">
					<form>			       
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
						   <select name = "expense-rate">
							<option  value="YEARLY">Per Year</option>
							<option  value="MONTHLY">Per Month</option>
							<option  value="WEEKLY">Per Week</option>
							<option  value="DAILY">Per Day</option>
							<option  value="NONE">Once</option>
						    </select>
						</td>
					    </tr>
				       </table>
				       <input type="submit" name="submit" value="Add"> 
				    </form>
				
			</div>
			
			<div id ="income-form" style="float:right">
				<form> 
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
						   <select name = "income-rate">
							<option  value="YEARLY">Per Year</option>
							<option  value="MONTHLY">Per Month</option>
							<option  value="WEEKLY">Per Week</option>
							<option  value="DAILY">Per Day</option>
							<option  value="NONE">Once</option>
						    </select>
						</td>
					    </tr>
				       </table>
					   <input type="submit" name="submit" value="Add"> 
				</form>
			</div>
			
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
		 window.location.reload();
		return true;
		}
		
		
	    </script>
	</body>
</html>
