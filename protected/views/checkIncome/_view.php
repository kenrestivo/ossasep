<div class="view checkbackground">


<table>
<tr><td><b><?php echo CHtml::encode($data->getAttributeLabel('payer')); ?></b>:
	<?php echo CHtml::encode($data->payer); ?></td>

<td><b><?php echo CHtml::encode($data->getAttributeLabel('check_date')); ?>:</b>
<?php echo CHtml::encode(Yii::app()->format->date($data->check_date)); ?></td>

<td><b><?php echo CHtml::encode($data->getAttributeLabel('check_num')); ?></b>:
	<?php echo CHtml::encode($data->check_num); ?><br />
    <?php echo $data->cash ? '<strong>CASH (not check)</strong>' : "" ?>
</td>
</tr>



<tr>
<td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('payee')); ?></b>:
	<?php echo CHtml::encode($data->payee->name); ?>
</td>
<td></td>
<td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->format->currency($data->amount)); ?>
</td>

</tr>
</table>

</div>