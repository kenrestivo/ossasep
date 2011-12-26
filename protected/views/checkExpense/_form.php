<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-expense-form',
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
		<?php echo $form->labelEx($model,'payee_id'); ?>
    <?php echo $form->dropDownList(
        $model,'payee_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name')); ?>
		<?php echo $form->error($model,'payee_id'); ?>

		<?php echo $form->error($model,'payee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_num'); ?>
		<?php echo $form->textField($model,'check_num'); ?>
		<?php echo $form->error($model,'check_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_date'); ?>
		<?php echo $form->textField($model,'check_date'); ?>
		<?php echo $form->error($model,'check_date'); ?>
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
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#check-expense-form")); ?>
