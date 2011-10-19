<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tclass-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'class_name'); ?>
		<?php echo $form->textField($model,'class_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'class_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_grade_allowed'); ?>
		<?php echo $form->textField($model,'min_grade_allowed'); ?>
		<?php echo $form->error($model,'min_grade_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_grade_allowed'); ?>
		<?php echo $form->textField($model,'max_grade_allowed'); ?>
		<?php echo $form->error($model,'max_grade_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dates_times'); ?>
		<?php echo $form->textField($model,'dates_times',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'dates_times'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_students'); ?>
		<?php echo $form->textField($model,'max_students'); ?>
		<?php echo $form->error($model,'max_students'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->