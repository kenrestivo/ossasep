<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payer')); ?>:</b>
	<?php echo CHtml::encode($data->payer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payee')); ?>:</b>
	<?php echo CHtml::encode($data->payee->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_num')); ?>:</b>
	<?php echo CHtml::encode($data->check_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_date')); ?>:</b>
	<?php echo CHtml::encode($data->check_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?>:</b>
	<?php echo CHtml::encode($data->delivered); ?>
	<br />

</div>