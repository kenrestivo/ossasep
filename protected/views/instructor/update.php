<?php
$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instructor', 'url'=>array('index')),
	array('label'=>'Create Instructor', 'url'=>array('create')),
	array('label'=>'View Instructor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);
?>

<h1>Update Instructor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>