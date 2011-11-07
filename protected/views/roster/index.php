<?php
$this->breadcrumbs=array(
	'Rosters',
);

$this->menu=array(
	array('label'=>'Create Roster', 'url'=>array('create')),
	array('label'=>'Manage Roster', 'url'=>array('admin')),
);
?>

<h1>Rosters</h1>


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
		'phone',
		'cell__parent_1',
		'cell_parent_2',
		'email_parent_1',
		'email__parent_2',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
