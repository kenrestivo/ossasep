<?php
$this->breadcrumbs=array(
	'Tstudents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TStudent', 'url'=>array('index')),
	array('label'=>'Create TStudent', 'url'=>array('create')),
	array('label'=>'Update TStudent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TStudent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TStudent', 'url'=>array('admin')),
);
?>

<h1>View TStudent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'full_name',
		'grade',
		'emergency_1',
		'emergency_2',
		'emergency_3',
	),
)); ?>
