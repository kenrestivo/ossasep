<?php
$this->breadcrumbs=array(
	'Class Meetings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClassMeeting', 'url'=>array('index')),
	array('label'=>'Create ClassMeeting', 'url'=>array('create')),
	array('label'=>'Update ClassMeeting', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassMeeting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassMeeting', 'url'=>array('admin')),
);
?>

<h1>View ClassMeeting #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'meeting_date',
		'note',
		'class.class_name',
	),
)); ?>
