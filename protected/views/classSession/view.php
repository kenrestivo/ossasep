<?php
$this->breadcrumbs=array(
	'Class Sessions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClassSession', 'url'=>array('index')),
	array('label'=>'Create ClassSession', 'url'=>array('create')),
	array('label'=>'Update ClassSession', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassSession', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassSession', 'url'=>array('admin')),
);
?>

<h1>View ClassSession #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'school_year.description',
		'description',
	),
)); ?>
