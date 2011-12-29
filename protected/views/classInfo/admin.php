<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('class-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Class Infos for <?=   $this->savedSessionSummary() ?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'class-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=> ZHtml::clickableRow('ClassInfo/view'),
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
		'company.name:ntext:Company',
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
