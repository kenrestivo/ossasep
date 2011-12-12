<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
        CHtml::listData(ClassInfo::model()->findAll(), 'id', 'description')); ?>

		<?php echo $form->error($model,'class_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'signup_date'); ?>

<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'signup_date',
  'value'=>$model->signup_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->signup_date,
   ),
));
?>
		<?php echo $form->error($model,'signup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scholarship'); ?>
		<?php echo $form->checkbox($model,'scholarship'); ?>
		<?php echo $form->error($model,'scholarship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
    <?php echo ZHtml::enumDropDownList( $model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
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