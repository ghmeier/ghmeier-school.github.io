<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php require_once("expense.php"); ?>
<?php require_once("income.php"); ?>
<?php require_once("globals.php"); ?>
<?php
if(sizeof($_POST)) {
	$name = $_POST["name"];
	$income_name = $_POST["income-name"];
	$income_amount = $_POST["income-amount"];
	$rate = $_POST["rate"];
	$expense_name = $_POST["expense-name"];
	$expense_amount = $_POST["expense-amount"];
}
?>
<html>
	<head>
		<title>9to5</title>
		<link href="9to5Stylesheet.css" rel="stylesheet" type="text/css"/>
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<?php 			
			session_start();
			$global = new Globals();
			$global->addIncome(new Income(100,$_SESSION['NONE'],5,"Work"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Foods"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Foods"));
			
		?>
	</head>

	<body>
		<div id = "container">
			
			
			<div id="expenses">
			<?php foreach ($global->getExpenses() as $expense) {?>
				<div class="expense">
					<?php echo $expense->getName(); ?>
				</div>
			<?php } ?>
			</div>
			
			<div id="balance">
				<?php if(strcmp($_COOKIE["user"],"name") == 0) { ?>
				<div style="margin-left:30%;margin-top:15%;">	
				<form method="post" action="setCookies()" name="create" onsubmit="return validateForm()">
					
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
							<option name="rate" value="4">Per Year</option>
							<option name="rate" value="3">Per Month</option>
							<option name="rate" value="2">Per Week</option>
							<option name="rate" value="1">Per Day</option>
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
			<?php foreach ($global->getIncomes() as $income) {?>
				<div  class="income">
					<?php echo $income->getName(); ?>
				</div>
			<?php } ?>
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
		return true;
		}
		
		function setCookies()
		{
			alert("kjshjkfdshkljdfs");
		}
	    </script>
	</body>
</html>
