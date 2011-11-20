<?php
$this->menu=array(
	array('label'=>'List Instructor', 'url'=>array('index')),
	array('label'=>'Create Instructor', 'url'=>array('create')),
	array('label'=>'Update Instructor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instructor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);

?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'email',
		'cell_phone',
		'other_phone',
		'note',
		'instructor_type.description',
	),
)); ?>

