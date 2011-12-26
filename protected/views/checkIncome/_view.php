<div class="view">


<table>
<tr><td><b><?php echo CHtml::encode($data->getAttributeLabel('payer')); ?></b>:
	<?php echo CHtml::encode($data->payer); ?></td>

<td></td>

<td><b><?php echo CHtml::encode($data->getAttributeLabel('check_num')); ?></b>:
	<?php echo CHtml::encode($data->check_num); ?>
	(<?php echo CHtml::encode($data->getAttributeLabel('cash')); ?>:
     <?php echo CHtml::encode($data->cash); ?> )
</td>
</tr>

<tr>
<td></td><td><b><?php echo CHtml::encode($data->getAttributeLabel('check_date')); ?>:</b>
	<?php echo CHtml::encode($data->check_date); ?></td>
<td></td>
<tr>
<td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('payee')); ?></b>:
	<?php echo CHtml::encode($data->payee->name); ?>
</td>
<td></td>
<td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
</td>

</tr>
<tr>
<td><b>
<?php echo CHtml::encode($data->getAttributeLabel('returned')); ?></b>:
	<?php echo CHtml::encode($data->returned); ?>
</td><td>
	<?php echo CHtml::encode($data->getAttributeLabel('deposit_id')); ?>:
	<?php echo isset($data->deposit) ? CHtml::encode($data->deposit->deposited_date) : "Not deposited yet" ?>
</td>
<td>
<b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?></b>:
	<?php echo CHtml::encode($data->delivered); ?>

</td>
</tr>
</table>

</div>