<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_phone'); ?>
		<?php echo $form->textField($model,'other_phone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'other_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instructor_type_id'); ?>

<?php echo $form->dropDownList(
    $model,'instructor_type_id',
    CHtml::listData(InstructorType::model()->findAll(), 
                    'id', 'description')); ?>

		<?php echo $form->error($model,'instructor_type_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>

<?php echo $form->dropDownList(
    $model,'company_id',
    CHtml::listData(Company::model()->findAll(), 
                    'id', 'name')); ?>

		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#instructor-form")); ?>
