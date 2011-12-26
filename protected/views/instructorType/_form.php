<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructor-type-form',
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
		<?php echo $form->labelEx($model,'Requirements'); ?>

<?php
$this->widget(
    'ext.Relation', array(
        'model' => $model,
        'relation' => 'requirements',
        'fields' => 'description',
        'allowEmpty' => false,
        'showAddButton' => "<br />Add New Requirement...",
        'style' => 'checkbox',
        'htmlOptions' => array(
            'template'=>'<span class="inlineCheckbox">{input}&nbsp;{label}</span>'
           ),
        'returnLink' => Yii::app()->request->requestUri

        )
    );
?>
		<?php echo $form->error($model,'requirements'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#instructor-type-form")); ?>
