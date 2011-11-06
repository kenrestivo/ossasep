<?php
$this->breadcrumbs=array(
	'Rosters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Roster', 'url'=>array('index')),
	array('label'=>'Create Roster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('roster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rosters</h1>

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
	'id'=>'roster-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
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
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
