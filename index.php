<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php require_once("expense.php"); ?>
<?php require_once("income.php"); ?>
<?php require_once("globals.php"); ?>
<html>
	<head>
		<title>9to5</title>
		<link href="9to5Stylesheet.css" rel="stylesheet" type="text/css"/>
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"/>
		<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css"/>
		<script src="script.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		
		<?php 			
			session_start();
			$global = new Globals();
			$global->addIncome(new Income(100,$_SESSION['YEARLY'],5,"Work"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Foods"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Drinks"));
			
		?>
		
		<script>
			$(document).ready( function() {
				setInterval( function(){
					alert(<?= json_encode($global->getExpenses()[0]->getAmountPaid()." ".$global->getExpenses()[0]->getAmount()) ?>);
					<?php $global->update() ?>
					
				},<?= json_encode($_SESSION["DELAY"]) ?>);
				
			
			
			});
		
		
		</script>
		
	</head>

	<body>
		<div id = "container">
			
			<div id="expenses">
			<?php foreach ($global->getExpenses() as $expense) {?>
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
				
			<?php } ?>
			</div>
			
			<div id="balance">
			
			</div>
			
			<div id="add-form">
				
				
			</div>
			
			<div id="income">
			<?php foreach ($global->getIncomes() as $income) {?>
				<div class="income">
					<?= $income->getName(); ?>
			<?php } ?>
			</div>
			
			
			

		</div>
	</body>
</html>
