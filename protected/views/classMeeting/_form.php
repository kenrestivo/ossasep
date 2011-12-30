<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-meeting-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'meeting_date'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'meeting_date',
  'value'=>$model->meeting_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->meeting_date,
   ),
));
?>
		<?php echo $form->error($model,'meeting_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
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
	<div class="row">
		<?php echo $form->labelEx($model,'makeup'); ?>
		<?php echo $form->checkbox($model,'makeup'); ?>
		<?php echo $form->error($model,'makeup'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#class-meeting-form")); ?>
