<div class="wide form">

<?php $this->widget( 'ext.EChosen.EChosen'); ?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<?php
if(!isset($_GET['check_id'])){
?>

	<div class="row">
		<?php echo $form->labelEx($model,'check_id'); ?>

    <?php echo $form->dropDownList(
        $model,'check_id',
        CHtml::listData(CheckIncome::model()->findAll(), 'id', 'summary'),
        array('class' => 'chzn-select')); ?>
		<?php echo $form->error($model,'check_id'); ?>
	</div>
   <?php } else { ?>
    Assign income for: 
	<?php echo CHtml::encode($model->check->summary);
          echo $form->hiddenField($model,"check_id"); 
               } ?>


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
    Assign income for: 
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
    Assign income for: 
	<?php echo CHtml::encode($model->class->summary);
          echo $form->hiddenField($model,"class_id"); 
               } ?>


	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->