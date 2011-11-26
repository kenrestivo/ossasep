<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_year_id')); ?>:</b>
	<?php echo CHtml::encode($data->school_year_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->description)); ?>
	<br />

 	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

 	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />


</div>