<?php
$this->breadcrumbs=array(
	'Class Sessions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClassSession', 'url'=>array('index')),
	array('label'=>'Create ClassSession', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('class-session-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Class Sessions</h1>

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
	'id'=>'class-session-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'school_year.description:School Year',
		'start_date:date',
		'end_date:date',
        'registration_starts:datetime:Registration Starts',
		'description',
        'public:boolean',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
