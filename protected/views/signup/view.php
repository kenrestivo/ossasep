<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Create Signup', 'url'=>array('create')),
	array('label'=>'Update Signup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Signup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>View Signup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'student_id',
        'class_id',
        'signup',
        'status'
	),
)); ?>
