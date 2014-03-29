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
			$global->addIncome(new Income(100,$_SESSION['NONE'],5,"Work"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Foods"));
			$global->addExpense(new Expense(100,0,$_SESSION['DAILY'],"Drinks"));
			
		?>
	</head>

	<body>
		<div id = "container">
			
			<div id="expenses">
			<?php foreach ($global->getExpenses() as $expense) {?>
				<div  class="expense">
					<?php echo $expense->getName(); ?>
					<div id =<?= "progressbar". $expense->getName() ?> > </div>
					<?php $expense->makePayment(10)?>
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
					<?php echo $income->getName(); ?>
										<div id =<?= "progressbar". $expense->getName() ?> > </div>
					<?php $income->makePayment(10)?>
					<script>
						var name = "#progressbar" + <?= json_encode($expense->getName()) ?>;
						$(name).progressbar({max: <?= json_encode($expense->getAmount()) ?>});
						$(name).progressbar({value: <?= json_encode($expense->getAmountPaid()) ?>});
					</script>
				</div>
			<?php } ?>
			</div>
			
			
			

		</div>
	</body>
</html>
