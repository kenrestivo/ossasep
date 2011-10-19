<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_name')); ?>:</b>
	<?php echo CHtml::encode($data->class_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_grade_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->min_grade_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_grade_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->max_grade_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dates_times')); ?>:</b>
	<?php echo CHtml::encode($data->dates_times); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('max_students')); ?>:</b>
	<?php echo CHtml::encode($data->max_students); ?>
	<br />

	*/ ?>

</div>