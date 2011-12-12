<div class="view">


     <?php echo CHtml::link('more',
                            array('view', 
                                  'student_id'=>$data->student_id, 
                                  'class_id' => $data->class_id)); ?><br/>


	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('signup_date')); ?>:</b>
	<?php echo CHtml::encode($data->signup_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('scholarship')); ?>:</b>
	<?php echo CHtml::encode($data->scholarship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />


</div>