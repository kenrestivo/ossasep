<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-inf-oform',
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
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost_per_class'); ?>
		<?php echo $form->textField($model,'cost_per_class',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'cost_per_class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_students'); ?>
		<?php echo $form->textField($model,'max_students'); ?>
		<?php echo $form->error($model,'max_students'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_week'); ?>
    <?php echo ZHtml::enumDropDownList( $model,'day_of_week'); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
    <?php echo ZHtml::enumDropDownList( $model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
    <?php echo $form->dropDownList(
        $model,'session_id',
        CHtml::listData(ClassSession::model()->findAll(), 'id', 'description')); ?>
		<?php echo $form->error($model,'session_id'); ?>
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