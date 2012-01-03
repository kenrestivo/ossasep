<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deposit-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
    <?= $model->id ?>
		<?php echo $form->error($model,'id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'deposited_date'); ?>
		<?php echo $form->textField($model,'deposited_date'); ?>
		<?php echo $form->error($model,'deposited_date'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
    <?php echo $form->dropDownList(
        $model,'session_id',
        CHtml::listData(ClassSession::model()->findAll(), 'id', 'summary')); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',
                                    array('size'=>40,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'total_amount'); ?>
	</div>


    <?php $this->renderPartial("_cash_form", 
                               array('model' => $model,
                                   'form' => $form));
     ?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#deposit-details-form")); ?>
