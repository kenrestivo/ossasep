<?php
$this->breadcrumbs=array(
	'School Calendars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SchoolCalendar', 'url'=>array('index')),
	array('label'=>'Create SchoolCalendar', 'url'=>array('create')),
	array('label'=>'Update SchoolCalendar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SchoolCalendar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolCalendar', 'url'=>array('admin')),
);
?>

<h1>View SchoolCalendar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'school_day',
		'school_in_session',
		'minimum',
		'school_year.description',
		'note',
	),
)); ?>
