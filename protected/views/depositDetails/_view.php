<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposited_date')); ?>:</b>
	<?php echo CHtml::encode($data->deposited_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_amount')); ?>:</b>
	<?php echo CHtml::encode($data->total_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pennies')); ?>:</b>
	<?php echo CHtml::encode($data->pennies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickels')); ?>:</b>
	<?php echo CHtml::encode($data->nickels); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimes')); ?>:</b>
	<?php echo CHtml::encode($data->dimes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quarters')); ?>:</b>
	<?php echo CHtml::encode($data->quarters); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('dollar_coins')); ?>:</b>
	<?php echo CHtml::encode($data->dollar_coins); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ones')); ?>:</b>
	<?php echo CHtml::encode($data->ones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fives')); ?>:</b>
	<?php echo CHtml::encode($data->fives); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tens')); ?>:</b>
	<?php echo CHtml::encode($data->tens); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twenties')); ?>:</b>
	<?php echo CHtml::encode($data->twenties); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fifties')); ?>:</b>
	<?php echo CHtml::encode($data->fifties); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hundreds')); ?>:</b>
	<?php echo CHtml::encode($data->hundreds); ?>
	<br />

	?>

</div>