<div class="view">


     <?php echo CHtml::link('more',
                            array('view', 
                                  'instructor_id'=>$data->instructor_id, 
                                  'class_id' => $data->class_id)); ?><br/>


	<b><?php echo CHtml::encode($data->getAttributeLabel('instructor_id')); ?>:</b>
	<?php echo CHtml::encode($data->instructor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />



</div>