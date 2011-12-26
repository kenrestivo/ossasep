<?php
$this->breadcrumbs=array(
	'Class Infos',
);

$this->menu=array(
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);
?>

<h1>Classes for <?= $this->savedSessionSummary() ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'class-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('ClassInfo/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		'class_name',
		'min_grade_allowed:grade',
		'max_grade_allowed:grade',
		'start_time:time',
		'end_time:time',
		'cost_per_class',
		'min_students',
		'max_students',
        array('name' => 'day_of_week',  // TODO use kformatter
              'value' => 'ZHtml::weekdayTranslation($data->day_of_week)'),
		'location',
		'status',
		'session.summary:text:Session',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
		),
	),
)); 

echo CHTML::link("Add New Class",
                 array("ClassInfo/create",
                       'returnTo' => Yii::app()->request->requestUri));



?>
