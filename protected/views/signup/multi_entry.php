<h3>Multi entry of classes for <?= $student->summary ?></h3>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'multi-signup-form',
	'enableAjaxValidation'=>false,
)); ?>

<table class="signups">
<tr>
<th>Student</th>
<th>Class</th>
<th>Signup Date</th>
<th>Scholarship</th>
<th>Status</th>
<th>Note</th>
</tr>
<?php echo $this->renderPartial('_row', array('student'=>$student)); ?>

</table>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>



<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#check-income-form")); ?>
