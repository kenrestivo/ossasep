<?php
$this->breadcrumbs=array(
	'Class Descriptions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClassDescription', 'url'=>array('index')),
	array('label'=>'Create ClassDescription', 'url'=>array('create')),
	array('label'=>'Update ClassDescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassDescription', 'url'=>array('admin')),
);
?>

<h1>View ClassDescription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'language_id',
		'class_id',
	),
)); ?>
