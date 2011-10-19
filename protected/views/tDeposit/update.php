<?php
$this->breadcrumbs=array(
	'Tdeposits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TDeposit', 'url'=>array('index')),
	array('label'=>'Create TDeposit', 'url'=>array('create')),
	array('label'=>'View TDeposit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TDeposit', 'url'=>array('admin')),
);
?>

<h1>Update TDeposit <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>