<?php
$this->breadcrumbs=array(
	'InstructorAssignments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InstructorAssignment', 'url'=>array('index')),
	array('label'=>'Manage InstructorAssignment', 'url'=>array('admin')),
);
?>

<h1>Create InstructorAssignment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>