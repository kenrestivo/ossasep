<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'requirermentstatus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php echo $form->dropDownList(
        $model,'instructor_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name')); ?>
		<?php echo $form->error($model,'instructor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requirement_type_id'); ?>


    <?php echo $form->dropDownList(
        $model,'requirement_type_id',
        CHtml::listData(RequirementType::model()->findAll(), 'id', 'description')); ?>
		<?php echo $form->error($model,'requirement_type_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'received'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'received',
  'value'=>$model->received,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'changeYear' => true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->received,
   ),
));
?>
		<?php echo $form->error($model,'received'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expired'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'expired',
  'value'=>$model->expired,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'changeYear' => true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->expired,
   ),
));
?>
		<?php echo $form->error($model,'expired'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->