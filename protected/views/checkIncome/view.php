<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CheckIncome', 'url'=>array('index')),
	array('label'=>'Create CheckIncome', 'url'=>array('create')),
	array('label'=>'Update CheckIncome', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CheckIncome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CheckIncome', 'url'=>array('admin')),
);
?>

<h1>View CheckIncome #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'amount',
		'payer',
		'payee',
		'check_num',
		'check_date',
		'deposit.deposited_date',
	),
)); ?>
