<?php
$this->breadcrumbs=array(
	'Instructors',
);

$this->menu=array(
	array('label'=>'Create Instructor', 'url'=>array('create')),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);
?>

<h1>Instructors</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'instructor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'full_name',
		'email',
		'cell_phone',
		'other_phone',
		'note',
		'instructor_type.description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
