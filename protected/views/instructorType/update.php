<?php
$this->breadcrumbs=array(
	'Instructor Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InstructorType', 'url'=>array('index')),
	array('label'=>'Create InstructorType', 'url'=>array('create')),
	array('label'=>'View InstructorType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InstructorType', 'url'=>array('admin')),
);
?>

<h1>Update InstructorType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>