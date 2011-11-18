<?php
$this->breadcrumbs=array(
	'InstructorAssignments',
);

$this->menu=array(
	array('label'=>'Create InstructorAssignment', 'url'=>array('create')),
	array('label'=>'Manage InstructorAssignment', 'url'=>array('admin')),
);
?>

<h1>InstructorAssignments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
