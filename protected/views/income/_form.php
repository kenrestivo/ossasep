<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'check_id'); ?>

    <?php echo $form->dropDownList(
        $model,'check_id',
        CHtml::listData(CheckIncome::model()->findAll(), 'id', 'short_name')); ?>
		<?php echo $form->error($model,'check_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>

    <?php echo $form->dropDownList(
        $model,'student_id',
        CHtml::listData(Student::model()->findAll(), 'id', 'full_name')); ?>

		<?php echo $form->error($model,'student_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>

    <?php echo $form->dropDownList(
        $model,'class_id',
        CHtml::listData(ClassInfo::model()->findAll(), 'id', 'class_name')); ?>

		<?php echo $form->error($model,'class_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'delivered'); ?>

<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'delivered',
  'value'=>$model->delivered,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->delivered,
   ),
));
?>
		<?php echo $form->error($model,'delivered'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->