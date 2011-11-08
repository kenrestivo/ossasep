<?php
$this->breadcrumbs=array(
	'Deposit Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DepositDetails', 'url'=>array('index')),
	array('label'=>'Create DepositDetails', 'url'=>array('create')),
	array('label'=>'Update DepositDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DepositDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>View DepositDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'deposited_date',
		'total_amount',
		'pennies',
		'nickels',
		'dimes',
		'quarters',
		'dollar_coins',
		'ones',
		'fives',
		'tens',
		'twenties',
		'fifties',
		'hundreds',
        'note'
	),
)); ?>
