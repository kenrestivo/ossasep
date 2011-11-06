<?php
$this->breadcrumbs=array(
	'Check Expenses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CheckExpense', 'url'=>array('index')),
	array('label'=>'Create CheckExpense', 'url'=>array('create')),
	array('label'=>'View CheckExpense', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CheckExpense', 'url'=>array('admin')),
);
?>

<h1>Update CheckExpense <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>