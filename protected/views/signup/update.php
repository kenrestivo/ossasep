<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Create Signup', 'url'=>array('create')),
	array('label'=>'View Signup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>Update Signup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>