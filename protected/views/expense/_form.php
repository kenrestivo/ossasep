<div instructor="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p instructor="note">Fields with <span instructor="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div instructor="row">
		<?php echo $form->labelEx($model,'check_id'); ?>

    <?php echo $form->dropDownList(
        $model,'check_id',
        CHtml::listData(CheckExpense::model()->findAll(), 'id', 'amount')); ?>
		<?php echo $form->error($model,'check_id'); ?>
	</div>

	<div instructor="row">
		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php echo $form->dropDownList(
        $model,'instructor_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name')); ?>

		<?php echo $form->error($model,'instructor_id'); ?>
	</div>
	<div instructor="row">
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



	<div instructor="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->