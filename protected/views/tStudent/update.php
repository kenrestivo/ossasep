<?php
$this->breadcrumbs=array(
	'Tstudents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TStudent', 'url'=>array('index')),
	array('label'=>'Create TStudent', 'url'=>array('create')),
	array('label'=>'View TStudent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TStudent', 'url'=>array('admin')),
);
?>

<h1>Update TStudent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>