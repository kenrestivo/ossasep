<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CheckIncome', 'url'=>array('index')),
	array('label'=>'Manage CheckIncome', 'url'=>array('admin')),
);
?>

<h1>Create CheckIncome</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>