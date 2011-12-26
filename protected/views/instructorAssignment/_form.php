<div class="wide form">

<?php $this->widget( 'ext.EChosen.EChosen'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructorassignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<?php
if(!isset($_GET['instructor_id'])){
?>

	<div class="row">
		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php echo $form->dropDownList(
        $model,'instructor_id',
        CHtml::listData(Instructor::model()->findAll(), 'id', 'full_name'),
        array('class' => 'chzn-select')); ?>
		<?php echo $form->error($model,'instructor_id'); ?>
	</div>

    <?php } else { ?>
    Add class for: 
	<?php echo CHtml::encode($model->instructor->full_name);
          echo $form->hiddenField($model,"instructor_id"); 
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
    Add instructor for: 
	<?php echo CHtml::encode($model->class->summary);
          echo $form->hiddenField($model,"class_id"); 
               } ?>


	<div class="row">
		<?php echo $form->labelEx($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'percentage'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#instructorassignment-form")); ?>
