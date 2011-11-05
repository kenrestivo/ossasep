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
		<?php echo $form->label($model,'school_day'); ?>
		<?php echo $form->textField($model,'school_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'school_in_session'); ?>
		<?php echo $form->textField($model,'school_in_session'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minimum'); ?>
		<?php echo $form->textField($model,'minimum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'school_year_id'); ?>
		<?php echo $form->textField($model,'school_year_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->