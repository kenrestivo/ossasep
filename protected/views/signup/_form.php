<div class="wide form">

<?php $this->widget( 'ext.EChosen.EChosen'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>

    <?php 
    ZHtml::multiEndedDropDown(
        $model, $form, 'student_id',
        "CHtml::listData(Student::model()->findAll(), 'id', 'full_name')",
       'CHtml::encode($model->student->full_name. " (" . Yii::app()->format->grade($model->student->grade) . ")")',
                array('class' => 'chzn-select'));
 ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>

    <?php 
      // I cannot use the multiendeddropdown here, because of the odd dropdown
    if(isset($model->class_id) && !$model->hasErrors()){
        echo CHtml::encode($model->class->summary);
        echo $form->hiddenField($model,"class_id"); 
    } else {
        echo $form->dropDownList(
            $model,'class_id',
            array(
                'In Grade Range' =>
                CHtml::listData(
                    ClassInfo::model()->findAll(
                        $model->student->grade . '>= min_grade_allowed and '.
                        $model->student->grade . '<= max_grade_allowed'), 
                    'id', 'summary'),
                'Outside Grade Range' =>
                CHtml::listData(
                    ClassInfo::model()->findAll(
                        $model->student->grade . '< min_grade_allowed or '.
                        $model->student->grade . '> max_grade_allowed'), 
                    'id', 'summary'),
                ), 
            array('class' => 'chzn-select',
                              'ajax' => array(
                  'type'=>'POST', 
                  'dataType' => 'json',
                  'url'=>CController::createUrl('ClassInfo/json'),
                  'success' => 
                  "function(data){
$('#Signup_additional_info').text('Student ' + data['enrolled_count'] + ' of ' + data['max_students']);
if(parseInt(data['enrolled_count']) >= parseInt(data['max_students'])){
    $('#Signup_status').val('Waitlist');
} else{
    $('#Signup_status').val('Enrolled');
}
;}",
                                  ))); 
    }
?> 

		<?php echo $form->error($model,'class_id'); ?>
	</div>





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
    <div id="Signup_additional_info" class="infoMessage" ></div>
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
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#signup-form")); ?>
