<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-expense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payee_id'); ?>

<?php
      // This is another odd one, so i'm not using ZHtml here either
      // I have to constrain based on company here.

if(isset($model->payee_id) && !$model->hasErrors()){
    echo CHtml::encode($model->payee->full_name);
    echo $form->hiddenField($model,"payee_id"); 
} else {
    $instparams = array(
        'condition'=>'company_id = :coid',
        'params'=>array(':coid' => Company::OSSPTO_COMPANY));
    $constraint = " (expense checks only for OSSPTO)";

    
    echo $form->dropDownList(
        $model,'payee_id',
        CHtml::listData(Instructor::model()->findAll($instparams), 
                        'id', 'full_name'),
        array(
            'ajax' => array(
                'type'=>'POST', //request type
                'url'=>Yii::app()->controller->createUrl("autocompleteamount"), 
                'success'=>'function(data){
                $("input#CheckExpense_amount").val(jQuery.parseJSON(data));}',
                )));
    echo $constraint;
} 

echo $form->error($model,'payee_id'); 

?>
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


    <?php 
      // NOTE: DO NOT LET THEM CHANGE THE SESSION!!!
    ZHtml::multiEndedDropDown(
        $model, $form, 'session_id',
        "CHtml::listData(ClassSession::model()->findAll(), 
                        'id', 'summary')",
        'CHtml::encode($model->session->summary)');
?>


		<?php echo $form->error($model,'session_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#check-expense-form")); ?>
