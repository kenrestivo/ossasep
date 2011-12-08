<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

 	<b><?php echo CHtml::encode($data->getAttributeLabel('meeting_date')); ?>:</b>
	<?php echo CHtml::encode($data->meeting_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class->class_name); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('makeup')); ?>:</b>
	<?php echo CHtml::encode($data->makeup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school_day.minimum')); ?>:</b>
	<?php echo CHtml::encode($data->school_day->minimum); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('school_day.day_off')); ?>:</b>
	<?php echo CHtml::encode($data->school_day->day_off); ?>
	<br />


</div>