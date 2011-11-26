<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payer'); ?>
		<?php echo $form->textField($model,'payer',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'payer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payee'); ?>
		<?php echo $form->textField($model,'payee',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'payee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_num'); ?>
		<?php echo $form->textField($model,'check_num'); ?>
		<?php echo $form->error($model,'check_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_date'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'check_date',
  'value'=>$model->check_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->check_date,
   ),
));
?>
		<?php echo $form->error($model,'check_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposit_id'); ?>
<?php echo $form->dropDownList(
    $model,'deposit_id',
    CHtml::listData(DepositDetails::model()->findAll(), 
                    'id', 'deposited_date')); ?>
		<?php echo $form->error($model,'deposit_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->