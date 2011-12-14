<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade')); ?>:</b>
	<?php echo CHtml::encode($data->grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_1')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_2')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_3')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_email')); ?>:</b>
	<?php echo CHtml::encode($data->parent_email); ?>
	<br />


</div>