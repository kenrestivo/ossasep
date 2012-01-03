<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deposit-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<span class="span-10">
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
</span>


<span class="span-7 last" >
	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

</span>
<div class="clear"></div>

<span class="span-5">
<div class="box">
<h3>Cash</h3>
	<div class="row">
		<?php echo $form->labelEx($model,'hundreds'); ?>
		<?php echo $form->textField($model,'hundreds', array('size' => 3)); ?>
		<?php echo $form->error($model,'hundreds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fifties'); ?>
		<?php echo $form->textField($model,'fifties', array('size' => 3)); ?>
		<?php echo $form->error($model,'fifties'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twenties'); ?>
		<?php echo $form->textField($model,'twenties', array('size' => 3)); ?>
		<?php echo $form->error($model,'twenties'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tens'); ?>
		<?php echo $form->textField($model,'tens', array('size' => 3)); ?>
		<?php echo $form->error($model,'tens'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fives'); ?>
		<?php echo $form->textField($model,'fives', array('size' => 3)); ?>
		<?php echo $form->error($model,'fives'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ones'); ?>
		<?php echo $form->textField($model,'ones', array('size' => 3)); ?>
		<?php echo $form->error($model,'ones'); ?>
	</div>
</div>
</span>

<span class="span-5 last" >
<div class="box">
<h3>Coins</h3>
	<div class="row">
		<?php echo $form->labelEx($model,'dollar_coins'); ?>
    <?php echo $form->textField($model,'dollar_coins', array('size' => 3)); ?>
		<?php echo $form->error($model,'dollar_coins'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quarters'); ?>
		<?php echo $form->textField($model,'quarters', array('size' => 3)); ?>
		<?php echo $form->error($model,'quarters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimes'); ?>
		<?php echo $form->textField($model,'dimes', array('size' => 3)); ?>
		<?php echo $form->error($model,'dimes'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nickels'); ?>
    <?php echo $form->textField($model,'nickels', 
                                array('size' => 3)); ?>
		<?php echo $form->error($model,'nickels'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pennies'); ?>
		<?php echo $form->textField($model,'pennies', array('size' => 3)); ?>
		<?php echo $form->error($model,'pennies'); ?>
	</div>
</div>
</span>



	<div class="row">
		<?php echo $form->labelEx($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'total_amount'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#deposit-details-form")); ?>
