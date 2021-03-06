<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-year-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'start_date',
  'value'=>$model->start_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->start_date,
   ),
));
?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'end_date',
  'value'=>$model->end_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->end_date,
   ),
));
?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#school-year-form")); ?>
