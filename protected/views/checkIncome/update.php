<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Check <?php echo $model->summary; ?> (received)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>