<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_day')); ?>:</b>
	<?php echo CHtml::encode($data->school_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_in_session')); ?>:</b>
	<?php echo CHtml::encode($data->school_in_session); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minimum')); ?>:</b>
	<?php echo CHtml::encode($data->minimum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_year_id')); ?>:</b>
	<?php echo CHtml::encode($data->school_year_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />


</div>