<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_name')); ?>:</b>
	<?php echo CHtml::encode($data->class_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_grade_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->min_grade_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_grade_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->max_grade_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_per_class')); ?>:</b>
	<?php echo CHtml::encode($data->cost_per_class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_students')); ?>:</b>
	<?php echo CHtml::encode($data->max_students); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_of_week')); ?>:</b>
	<?php echo CHtml::encode($data->day_of_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::encode($data->session_id); ?>
	<br />

	*/ ?>

</div>