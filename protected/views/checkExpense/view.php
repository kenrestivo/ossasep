<?php
$this->breadcrumbs=array(
	'Check Expenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CheckExpense', 'url'=>array('index')),
	array('label'=>'Create CheckExpense', 'url'=>array('create')),
	array('label'=>'Update CheckExpense', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CheckExpense', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CheckExpense', 'url'=>array('admin')),
);
?>

<h1>View CheckExpense #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'amount',
		'payer',
		'payee.full_name',
		'check_num',
		'check_date',
        'delivered',
        'session.summary:text:Session',
	),
)); ?>
