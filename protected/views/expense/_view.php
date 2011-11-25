<div check="view">


     <?php echo CHtml::link('more',
                            array('view', 
                                  'instructor_id'=>$data->instructor_id, 
                                  'check_id' => $data->check_id)); ?><br/>


	<b><?php echo CHtml::encode($data->getAttributeLabel('instructor_id')); ?>:</b>
	<?php echo CHtml::encode($data->instructor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_id')); ?>:</b>
	<?php echo CHtml::encode($data->check_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?>:</b>
	<?php echo CHtml::encode($data->delivered); ?>
	<br />


</div>