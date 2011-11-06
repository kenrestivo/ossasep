<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deposited_date'); ?>
		<?php echo $form->textField($model,'deposited_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pennies'); ?>
		<?php echo $form->textField($model,'pennies'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nickels'); ?>
		<?php echo $form->textField($model,'nickels'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dimes'); ?>
		<?php echo $form->textField($model,'dimes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quarters'); ?>
		<?php echo $form->textField($model,'quarters'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dollar_coins'); ?>
		<?php echo $form->textField($model,'dollar_coins'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ones'); ?>
		<?php echo $form->textField($model,'ones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fives'); ?>
		<?php echo $form->textField($model,'fives'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tens'); ?>
		<?php echo $form->textField($model,'tens'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'twenties'); ?>
		<?php echo $form->textField($model,'twenties'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fifties'); ?>
		<?php echo $form->textField($model,'fifties'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hundreds'); ?>
		<?php echo $form->textField($model,'hundreds'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->