<?php
$this->breadcrumbs=array(
	'Checks Paid'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Checks Paid', 'url'=>array('index')),
	array('label'=>'Create Checks paid', 'url'=>array('create')),
	array('label'=>'Update Check', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Check', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CheckExpense', 'url'=>array('admin')),
);
?>

<h1>View Check <?php echo $model->summary; ?></h1>

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
