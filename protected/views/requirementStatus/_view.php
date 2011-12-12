<div class="view">


     <?php echo CHtml::link('more',
                            array('view', 
                                  'instructor_id'=>$data->instructor_id, 
                                  'requirement_type_id' => $data->requirement_type_id)); ?><br/>


	<b><?php echo CHtml::encode($data->getAttributeLabel('instructor_id')); ?>:</b>
	<?php echo CHtml::encode($data->instructor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requirement_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->requirement_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('received')); ?>:</b>
	<?php echo CHtml::encode($data->received); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expired')); ?>:</b>
	<?php echo CHtml::encode($data->expired); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />



</div>