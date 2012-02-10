<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'check_num'); ?>
		<?php echo $form->textField($model,'check_num'); ?>
		<?php echo $form->error($model,'check_num'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'check_date'); ?>
<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'check_date',
  'value'=>$model->check_date,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->check_date,
   ),
));
?>
		<?php echo $form->error($model,'check_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payer'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'CheckIncome[payer]',
    'source'=>Yii::app()->controller->createUrl("autocomplete"),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
        ),
                      ));
?>
		<?php echo $form->error($model,'payer'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'payee_id'); ?>

    <?php 
    if(isset($model->payee_id)){
        echo CHtml::encode($model->payee->name);
        echo $form->hiddenField($model, 'payee_id');
    } else
        
        echo $form->dropDownList(
            $model,'payee_id',
            CHtml::listData(Company::model()->findAll(), 'id', 'name')); 

?>



		<?php echo $form->error($model,'payee_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
    <?php echo $form->dropDownList(
        $model,'session_id',
        CHtml::listData(ClassSession::model()->findAll(), 'id', 'summary')); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>



<?php echo $this->renderPartial('_income_subrecords', array('model'=>$model,
                                    'income' => $income)); ?>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<script type="text/javascript">


function deleteRow(button)
{
    button.parents('tr').detach();
}
 
</script>

<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#check-income-form")); ?>
