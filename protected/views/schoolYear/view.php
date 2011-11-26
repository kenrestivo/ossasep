<?php
$this->breadcrumbs=array(
	'School Years'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SchoolYear', 'url'=>array('index')),
	array('label'=>'Create SchoolYear', 'url'=>array('create')),
	array('label'=>'Update SchoolYear', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SchoolYear', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolYear', 'url'=>array('admin')),
);
?>

<h1>View SchoolYear #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'start_date',
		'end_date',
	),
)); ?>
