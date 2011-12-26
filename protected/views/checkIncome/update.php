<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CheckIncome', 'url'=>array('index')),
	array('label'=>'Create CheckIncome', 'url'=>array('create')),
	array('label'=>'View CheckIncome', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CheckIncome', 'url'=>array('admin')),
);
?>

<h1>Update Check <?php echo $model->summary; ?> (received)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>