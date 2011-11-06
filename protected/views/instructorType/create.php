<?php
$this->breadcrumbs=array(
	'Instructor Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InstructorType', 'url'=>array('index')),
	array('label'=>'Manage InstructorType', 'url'=>array('admin')),
);
?>

<h1>Create InstructorType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>