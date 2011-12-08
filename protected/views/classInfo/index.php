<?php
$this->breadcrumbs=array(
	'Class Infos',
);

$this->menu=array(
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);
?>

<h1>Class Infos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'class-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'class_name',
		'min_grade_allowed',
		'max_grade_allowed',
		'start_time',
		'end_time',
		'cost_per_class',
		'min_students',
		'max_students',
        array('name' => 'day_of_week', 
              'value' => 'ZHtml::weekdayTranslation($data->day_of_week)'),
		'location',
		'status',
		'session.formatted_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

echo CHTML::link("Add New Class",
                 array("ClassInfo/create",
                       'returnTo' => Yii::app()->request->requestUri));



?>
