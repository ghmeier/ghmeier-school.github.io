<script>        			
					<?php $global->update(); ?>
						<?php foreach ( $global->getExpenses() as $expense) { ?>
							var name = "#progressbar" + <?= json_encode($expense->getName()) ?>;
							var labelName = ".label" + <?= json_encode($expense->getName()) ?>;

							$(name).progressbar({value: <?= json_encode($expense->getAmountPaid()) ?>});
							$(labelName).innerHTML = <?= json_encode("$".$expense->getAmountPaid()) ?>;
						<?php } ?>
						</script>