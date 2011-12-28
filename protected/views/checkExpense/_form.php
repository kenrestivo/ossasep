<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payee_id'); ?>
    <?php echo $form->dropDownList(
        $model,'payee_id',
        CHtml::listData(ClassSession::current()->osspto_instructors,
                        'id', 'full_name'));
?> (NOTE: Only OSSPTO instructors are paid with expense checks)
		<?php echo $form->error($model,'payee_id'); ?>

		<?php echo $form->error($model,'payee_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
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
	<div class="row">
		<?php echo $form->labelEx($model,'payer'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'payer',
    'source'=>Yii::app()->controller->createUrl("autocompletepayer"),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
        ),
                      ));
?>

		<?php echo $form->error($model,'payer'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
    <?php echo $form->dropDownList(
        $model,'session_id',
        CHtml::listData(ClassSession::model()->findAll(), 'id', 'summary')); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#check-expense-form")); ?>
