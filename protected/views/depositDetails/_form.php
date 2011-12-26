<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deposit-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deposited_date'); ?>
		<?php echo $form->textField($model,'deposited_date'); ?>
		<?php echo $form->error($model,'deposited_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'total_amount'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'hundreds'); ?>
		<?php echo $form->textField($model,'hundreds'); ?>
		<?php echo $form->error($model,'hundreds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fifties'); ?>
		<?php echo $form->textField($model,'fifties'); ?>
		<?php echo $form->error($model,'fifties'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twenties'); ?>
		<?php echo $form->textField($model,'twenties'); ?>
		<?php echo $form->error($model,'twenties'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tens'); ?>
		<?php echo $form->textField($model,'tens'); ?>
		<?php echo $form->error($model,'tens'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fives'); ?>
		<?php echo $form->textField($model,'fives'); ?>
		<?php echo $form->error($model,'fives'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ones'); ?>
		<?php echo $form->textField($model,'ones'); ?>
		<?php echo $form->error($model,'ones'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'dollar_coins'); ?>
		<?php echo $form->textField($model,'dollar_coins'); ?>
		<?php echo $form->error($model,'dollar_coins'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quarters'); ?>
		<?php echo $form->textField($model,'quarters'); ?>
		<?php echo $form->error($model,'quarters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimes'); ?>
		<?php echo $form->textField($model,'dimes'); ?>
		<?php echo $form->error($model,'dimes'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nickels'); ?>
		<?php echo $form->textField($model,'nickels'); ?>
		<?php echo $form->error($model,'nickels'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pennies'); ?>
		<?php echo $form->textField($model,'pennies'); ?>
		<?php echo $form->error($model,'pennies'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
    <?php echo $form->dropDownList(
        $model,'session_id',
        CHtml::listData(ClassSession::model()->findAll(), 'id', 'summary')); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#deposit-details-form")); ?>
