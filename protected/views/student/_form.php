<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->textField($model,'grade'); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'emergency_1'); ?>
		<?php echo $form->textField($model,'emergency_1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'emergency_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_2'); ?>
		<?php echo $form->textField($model,'emergency_2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'emergency_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_3'); ?>
		<?php echo $form->textField($model,'emergency_3',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'emergency_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_email'); ?>
		<?php echo $form->textField($model,'parent_email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'parent_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'public_email_ok'); ?>
		<?php echo $form->checkbox($model,'public_email_ok'); ?>
		<?php echo $form->error($model,'public_email_ok'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->