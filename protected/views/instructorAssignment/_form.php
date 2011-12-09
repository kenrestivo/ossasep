<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructorassignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php echo $form->dropDownList(
        $model,'instructor_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name')); ?>
		<?php echo $form->error($model,'instructor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>


    <?php echo $form->dropDownList(
        $model,'class_id',
        CHtml::listData(ClassInfo::model()->findAll(), 'id', 'summary')); ?>

		<?php echo $form->error($model,'class_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'percentage'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->