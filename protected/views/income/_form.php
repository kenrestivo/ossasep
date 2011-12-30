<div class="wide form">

<?php $this->widget( 'ext.EChosen.EChosen'); ?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">

		<?php 
     echo $form->labelEx($model,'check_id');

    ZHtml::multiEndedDropDown(
        $model, $form, 'check_id',
        "CHtml::listData(CheckIncome::model()->underAssignedChecks(), 
                        'id', 'summary')",
        'CHtml::encode($model->check->summary)');
echo $form->error($model,'check_id'); 
?>
	</div>


	<div class="row">
<?php

    echo $form->labelEx($model,'student_id'); 

ZHtml::multiEndedDropDown(
    $model, $form, 'student_id',
    "CHtml::listData(Student::model()->findAll(), 'id', 'full_name')",
    'CHtml::encode($model->student->full_name)',
    array('class' => 'chzn-select')); 

echo $form->error($model,'student_id'); 
?>

	</div>


	<div class="row">

		<?php 
    echo $form->labelEx($model,'class_id');

    ZHtml::multiEndedDropDown(
        $model,$form, 'class_id',
        "CHtml::listData(ClassInfo::model()->findAll(), 'id', 'summary')",
        'CHtml::encode($model->class->summary)',
        array('class' => 'chzn-select'));

echo $form->error($model,'class_id'); 


 ?>
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
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#income-form")); ?>
