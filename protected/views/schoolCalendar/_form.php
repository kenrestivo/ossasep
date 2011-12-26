<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-calendar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'school_day'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'school_day',
  'value'=>$model->school_day,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->school_day,
   ),
));
?>
		<?php echo $form->error($model,'school_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_off'); ?>
		<?php echo $form->checkbox($model,'day_off'); ?>
		<?php echo $form->error($model,'day_off'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minimum'); ?>
		<?php echo $form->checkbox($model,'minimum'); ?>
		<?php echo $form->error($model,'minimum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_year_id'); ?>

<?php echo $form->dropDownList(
    $model,'school_year_id',
    CHtml::listData(SchoolYear::model()->findAll(), 
                    'id', 'description')); ?>
		<?php echo $form->error($model,'school_year_id'); ?>
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