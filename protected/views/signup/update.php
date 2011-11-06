<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	'Edit',
    );


$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Create Signup', 'url'=>array('create')),
	array('label'=>'View Signup', 'url'=>array('view', 'student_id'=>$model->student_id, 'class_id' => $model->class_id)),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>Update Signup <?php echo $model->student->full_name. " " . $model->class->class_name  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>