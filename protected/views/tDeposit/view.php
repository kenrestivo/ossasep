<?php
$this->breadcrumbs=array(
	'Tdeposits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TDeposit', 'url'=>array('index')),
	array('label'=>'Create TDeposit', 'url'=>array('create')),
	array('label'=>'Update TDeposit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TDeposit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TDeposit', 'url'=>array('admin')),
);
?>

<h1>View TDeposit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'amount',
		'deposit_date',
	),
)); ?>
