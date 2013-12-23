<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class_name'); ?>
		<?php echo $form->textField($model,'class_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_grade_allowed'); ?>
		<?php echo $form->textField($model,'min_grade_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_grade_allowed'); ?>
		<?php echo $form->textField($model,'max_grade_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'cost_per_class'); ?>
		<?php echo $form->textField($model,'cost_per_class',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_students'); ?>
		<?php echo $form->textField($model,'min_students'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'max_students'); ?>
		<?php echo $form->textField($model,'max_students'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->