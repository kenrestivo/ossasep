<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-calendar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'school_day'); ?>
		<?php echo $form->textField($model,'school_day'); ?>
		<?php echo $form->error($model,'school_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_in_session'); ?>
		<?php echo $form->checkbox($model,'school_in_session'); ?>
		<?php echo $form->error($model,'school_in_session'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minimum'); ?>
		<?php echo $form->checkbox($model,'minimum'); ?>
		<?php echo $form->error($model,'minimum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_year_id'); ?>

<?php echo $form->dropDownList(
    $model,'school_year_id',
    CHtml::listData(SchoolYear::model()->findAll(), 
                    'id', 'description')); ?>
		<?php echo $form->error($model,'school_year_id'); ?>
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