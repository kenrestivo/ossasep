<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-description-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>20, 'cols'=>110)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>





	<div language="row">
		<?php echo $form->labelEx($model,'language_id'); ?>



<?php 


    ZHtml::multiEndedDropDown(
        $model, $form, 'language_id',
		// TODO: ONLY do this if the classid is presented. which it should.
        "CHtml::listData(Language::model()->findAll(\"t.id not in (select language_id from class_description where class_id = {$model->class->id})\"), 
                        'id', 'description')",
        'CHtml::encode($model->language->description)');

?>

		<?php echo $form->error($model,'language_id'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>

<?php 
    ZHtml::multiEndedDropDown(
        $model, $form, 'class_id',
        "CHtml::listData(ClassInfo::model()->findAll(), 
                        'id', 'summary')",
        'CHtml::encode($model->class->summary)');

?>

		<?php echo $form->error($model,'class_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->