<?php
$this->breadcrumbs=array(
	'Rosters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Roster', 'url'=>array('index')),
	array('label'=>'Create Roster', 'url'=>array('create')),
	array('label'=>'Update Roster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Roster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Roster', 'url'=>array('admin')),
);
?>

<h1>View Roster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'last_name',
		'first_name',
		'grade',
		'teacher',
		'parent_1',
		'parent_2',
		'parent_3',
		'parent_4',
		'phone',
		'cell__parent_1',
		'cell_parent_2',
		'email_parent_1',
		'email__parent_2',
		'email_parent_3',
		'email_parent_4',
		'home_address',
		'home_city',
		'zip_code',
		'home_address_2',
		'school_job',
	),
)); ?>
