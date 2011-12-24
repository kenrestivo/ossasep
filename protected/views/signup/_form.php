<div class="form">

<?php $this->widget( 'ext.EChosen.EChosen'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<?php
if(!isset($_GET['student_id'])){
?>
	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>

    <?php echo $form->dropDownList(
        $model,'student_id',
        CHtml::listData(Student::model()->findAll(), 'id', 'full_name'),
        array('class' => 'chzn-select')); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>
    <?php } else { ?>
    Add class for: 
	<?php echo CHtml::encode($model->student->full_name);
          echo $form->hiddenField($model,"student_id"); 
               } ?>


<?php
if(!isset($_GET['class_id'])){
?>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>

    <?php echo $form->dropDownList(
        $model,'class_id',
        CHtml::listData(ClassInfo::model()->findAll(), 'id', 'summary'), 
        array('class' => 'chzn-select')); ?>

		<?php echo $form->error($model,'class_id'); ?>
	</div>


    <?php } else { ?>
    Add student for: 
	<?php echo CHtml::encode($model->class->summary);
          echo $form->hiddenField($model,"class_id"); 
               } ?>



	<div class="row">
		<?php echo $form->labelEx($model,'signup_date'); ?>
    <?php echo $form->textField($model,'signup_date',array('size'=>20)) ?>
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