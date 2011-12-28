<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructorassignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">

<?php
if(!isset($_GET['instructor_id'])){
?>

		<?php echo $form->labelEx($model,'instructor_id'); ?>

    <?php 
          $instparams=array();
    $constraint = "";
          if(isset($model->class_id)){
              $instparams = array(
                  'condition'=>'company_id = :coid',
                  'params'=>array(':coid' => $model->class->company_id));
              $constraint = " (for ". $model->class->company->name . ")";
          }

          echo $form->dropDownList(
              $model,'instructor_id',
              CHtml::listData(Instructor::model()->findAll($instparams), 
                              'id', 'full_name')
              ); 
          echo $constraint;
          ?>
		<?php echo $form->error($model,'instructor_id'); ?>

    <?php } else { ?>
    Add class for: 
	<?php echo CHtml::encode($model->instructor->full_name);
          echo $form->hiddenField($model,"instructor_id"); 
               } 
?>
	</div>


	<div class="row">

<?php
if(!isset($_GET['class_id'])){
?>

		<?php echo $form->labelEx($model,'class_id'); ?>


    <?php 


          $classparams=array();
    $constraint = "";
          if(isset($model->instructor_id)){
              $classparams = array(
                  'condition'=>'company_id = :coid',
                  'params'=>array(':coid' => $model->instructor->company_id));
              $constraint = " (for ". $model->instructor->company->name. ')';

          }

          
          echo $form->dropDownList(
              $model,'class_id',
              CHtml::listData(ClassInfo::model()->findAll($classparams), 
                              'id', 'summary')
              ); 

          echo $constraint;

?>

		<?php echo $form->error($model,'class_id'); ?>
    <?php } else { ?>
    Add instructor for: 
	<?php echo CHtml::encode($model->class->summary);
          echo $form->hiddenField($model,"class_id"); 
               } ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'percentage'); ?>
    <?php 
    echo $form->textField($model,'percentage',
                          array('size'=>3,
                                'maxlength'=>3)); 
echo CHtml::encode(' %'); 
?>
		<?php echo $form->error($model,'percentage'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#instructorassignment-form")); ?>
