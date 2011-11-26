<div check="view">


     <?php echo CHtml::link('more',
                            array('view', 
                                  'student_id'=>$data->student_id, 
                                  'check_id' => $data->check_id)); ?><br/>


	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_id')); ?>:</b>
	<?php echo CHtml::encode($data->check->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class->class_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?>:</b>
	<?php echo CHtml::encode($data->delivered); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

    <?php if(isset($data->deposit)){ ?>
	<b><?php echo CHtml::encode('deposit'); ?>:</b>
	<?php echo CHtml::encode($data->deposit->deposited_date); ?>
	<br />
     <?php } ?>


</div>