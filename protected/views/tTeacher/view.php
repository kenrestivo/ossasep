<?php
$this->breadcrumbs=array(
	'Tteachers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TTeacher', 'url'=>array('index')),
	array('label'=>'Create TTeacher', 'url'=>array('create')),
	array('label'=>'Update TTeacher', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TTeacher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TTeacher', 'url'=>array('admin')),
);
?>

<h1>View TTeacher #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'full_name',
		'email',
		'phone',
	),
)); ?>
