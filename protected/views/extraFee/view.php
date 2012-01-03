<?php
$this->breadcrumbs=array(
	'Extra Fees'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ExtraFee', 'url'=>array('index')),
	array('label'=>'Create ExtraFee', 'url'=>array('create')),
	array('label'=>'Update ExtraFee', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExtraFee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExtraFee', 'url'=>array('admin')),
);
?>

<h1>View ExtraFee #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'amount',
		'description',
		'class.summary',
	),
)); ?>
