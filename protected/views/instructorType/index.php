<?php
$this->breadcrumbs=array(
	'Instructor Types',
);

$this->menu=array(
	array('label'=>'Create InstructorType', 'url'=>array('create')),
	array('label'=>'Manage InstructorType', 'url'=>array('admin')),
);
?>

<h1>Instructor Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
