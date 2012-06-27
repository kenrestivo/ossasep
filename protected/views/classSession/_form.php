<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-session-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'school_year_id'); ?>
    <?php echo $form->dropDownList(
        $model,'school_year_id',
        CHtml::listData(
            SchoolYear::model()->findAll(
                array('order' => 'start_date DESC')), 
            'id', 'description')); ?>


		<?php echo $form->error($model,'school_year_id'); ?>
	</div>

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


	<div class="row">
		<?php echo $form->labelEx($model,'registration_starts'); ?>
    <?php echo $form->textField($model,'registration_starts',array('size'=>20)) ?>
		<?php echo $form->error($model,'registration_starts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'public'); ?>
		<?php echo $form->checkbox($model,'public'); ?>
		<?php echo $form->error($model,'public'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#class-session-form")); ?>
