<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade')); ?>:</b>
	<?php echo CHtml::encode($data->grade); ?>
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


</div>