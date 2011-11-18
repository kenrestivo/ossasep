<?php
$this->breadcrumbs=array(
	'InstructorAssignments'=>array('index'),
	'Edit',
    );


$this->menu=array(
	array('label'=>'List InstructorAssignment', 'url'=>array('index')),
	array('label'=>'Create InstructorAssignment', 'url'=>array('create')),
	array('label'=>'View InstructorAssignment', 'url'=>array('view', 'instructor_id'=>$model->instructor_id, 'class_id' => $model->class_id)),
	array('label'=>'Manage InstructorAssignment', 'url'=>array('admin')),
);
?>

<h1>Update InstructorAssignment <?php echo $model->instructor->full_name. " " . $model->class->class_name  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>