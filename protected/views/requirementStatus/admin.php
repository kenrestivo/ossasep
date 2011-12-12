<?php
$this->breadcrumbs=array(
	'Requirement Statuss'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RequirementStatus', 'url'=>array('index')),
	array('label'=>'Create RequirementStatus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('class-meeting-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Requirement Statuss</h1>

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
	'id'=>'class-meeting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'instructor.full_name',
		'requirement_type.description',
        'received',
        'expired',
        'note',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
