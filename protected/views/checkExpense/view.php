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

<h1>View CheckExpense <?php echo $model->summary; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'check_num',
		'amount:currency',
		'payee.full_name:ntext:Instructor',
		'check_date:date',
        'delivered:date',
		'payer:ntext',
        'session.summary:text:Session',
	),
)); ?>
