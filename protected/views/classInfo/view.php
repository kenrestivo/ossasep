<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Update ClassInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);

xdebug_break();
?>

<h1>View ClassInfo <?php echo $model->class_name; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_name',
		'min_grade_allowed',
		'max_grade_allowed',
		'start_time',
		'end_time',
		'description',
		'cost_per_class',
		'max_students',
		'day_of_week',
		'location',
		'status',
		'session.description',
	),
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>new CArrayDataProvider($model->students, array()),
//	'filter'=>$model->students,
	'columns'=>array(
		'full_name',
		'grade',
		'emergency_1',
		'emergency_2',
		'emergency_3',
		'parent_email',
		array(
			'class'=>'CButtonColumn',
            'viewButtonUrl'=>
            'Yii::app()->createUrl("/Student/view", array("id" => $data["id"]))',
            'updateButtonUrl'=>
            'Yii::app()->createUrl("/Student/update", array("id" => $data["id"]))',
		),
	),
)); ?>
