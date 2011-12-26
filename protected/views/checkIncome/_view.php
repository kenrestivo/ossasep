<div class="view">


<table>
<tr><td><b><?php echo CHtml::encode($data->getAttributeLabel('payer')); ?></b>:
	<?php echo CHtml::encode($data->payer); ?></td>

<td></td>

<td><b><?php echo CHtml::encode($data->getAttributeLabel('check_num')); ?></b>:
	<?php echo CHtml::encode($data->check_num); ?><br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('cash')); ?></b>:
     <?php echo CHtml::encode($data->cash); ?> 
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
</table>

</div>