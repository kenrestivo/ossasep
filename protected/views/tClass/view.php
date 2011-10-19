<?php
$this->breadcrumbs=array(
	'Tclasses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TClass', 'url'=>array('index')),
	array('label'=>'Create TClass', 'url'=>array('create')),
	array('label'=>'Update TClass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TClass', 'url'=>array('admin')),
);
?>

<h1>View TClass #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'class_name',
		'description',
		'min_grade_allowed',
		'max_grade_allowed',
		'dates_times',
		'cost',
		'max_students',
	),
)); ?>
