<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'roster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->textField($model,'grade',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacher'); ?>
		<?php echo $form->textField($model,'teacher',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'teacher'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_1'); ?>
		<?php echo $form->textField($model,'parent_1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'parent_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_2'); ?>
		<?php echo $form->textField($model,'parent_2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'parent_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_3'); ?>
		<?php echo $form->textField($model,'parent_3',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'parent_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_4'); ?>
		<?php echo $form->textField($model,'parent_4',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'parent_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell__parent_1'); ?>
		<?php echo $form->textField($model,'cell__parent_1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cell__parent_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_parent_2'); ?>
		<?php echo $form->textField($model,'cell_parent_2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cell_parent_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_parent_1'); ?>
		<?php echo $form->textField($model,'email_parent_1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_parent_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email__parent_2'); ?>
		<?php echo $form->textField($model,'email__parent_2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email__parent_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_parent_3'); ?>
		<?php echo $form->textField($model,'email_parent_3',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_parent_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_parent_4'); ?>
		<?php echo $form->textField($model,'email_parent_4',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email_parent_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_address'); ?>
		<?php echo $form->textField($model,'home_address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'home_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_city'); ?>
		<?php echo $form->textField($model,'home_city',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'home_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_address_2'); ?>
		<?php echo $form->textField($model,'home_address_2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'home_address_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_job'); ?>
		<?php echo $form->textField($model,'school_job',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'school_job'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->