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

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />



</div>