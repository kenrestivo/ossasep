<?php
$this->breadcrumbs=array(
	'Instructor Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InstructorType', 'url'=>array('index')),
	array('label'=>'Create InstructorType', 'url'=>array('create')),
	array('label'=>'Update InstructorType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InstructorType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InstructorType', 'url'=>array('admin')),
);
?>

<h1>View InstructorType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>
