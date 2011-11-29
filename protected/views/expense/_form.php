<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'check_id'); ?>

    <?php echo $form->dropDownList(
        $model,'check_id',
        CHtml::listData(CheckExpense::model()->findAll(), 'id', 'amount')); ?>
		<?php echo $form->error($model,'check_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php echo $form->dropDownList(
        $model,'instructor_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name')); ?>

		<?php echo $form->error($model,'instructor_id'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->