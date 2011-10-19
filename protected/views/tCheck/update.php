<?php
$this->breadcrumbs=array(
	'Tchecks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TCheck', 'url'=>array('index')),
	array('label'=>'Create TCheck', 'url'=>array('create')),
	array('label'=>'View TCheck', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TCheck', 'url'=>array('admin')),
);
?>

<h1>Update TCheck <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>