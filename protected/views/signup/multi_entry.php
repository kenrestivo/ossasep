<h3>Multi entry of classes for <?= $student->summary ?></h3>

<div class="form wide">
<?php $this->widget( 'ext.EChosen.EChosen'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'multi-signup-form',
	'enableAjaxValidation'=>false,
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>



<table class="signups">
<tr>
<th>Class</th>
<th>Signup Date</th>
<th>Scholarship</th>
<th>Status</th>
<th>Note</th>
<th></th>
</tr>

<?php 
     foreach($models as $i=>$model){
     echo $this->renderPartial('_row', 
                               array(
                                   'student'=>$student,
                                   'index' => $i,
                                   'model' => $model,
                                   'form' => $form)); 
 }
?>

</table>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Save All'); ?>
	</div>


<?php $this->endWidget(); ?>

</div>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<script type="text/javascript">


function deleteRow(button)
{
    button.parents('tr').detach();
}
 
</script>


<?php echo $this->renderPartial('/site/_unsaved_changes_warning',
                                array('form_id'=>"#multi-signup-form")); ?>
