<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'requirement-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Instructor Types'); ?>

<?php
$this->widget(
    'ext.Relation', array(
        'model' => $model,
        'relation' => 'instructor_types',
        'fields' => 'description',
        'allowEmpty' => false,
        'showAddButton' => "<br />Add New Instructor Type...",
        'style' => 'checkbox',
        'htmlOptions' => array(
            'template'=>'<span class="inlineCheckbox">{input}&nbsp;{label}</span>'
           ),
        'returnLink' => Yii::app()->request->requestUri

        )
    );
?>
		<?php echo $form->error($model,'instructor_types'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->