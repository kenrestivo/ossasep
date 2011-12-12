<?php
$this->breadcrumbs=array(
	'Class Sessions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassSession', 'url'=>array('index')),
	array('label'=>'Create ClassSession', 'url'=>array('create')),
	array('label'=>'View ClassSession', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassSession', 'url'=>array('admin')),
);
?>

<h1>Update ClassSession <?php echo $model->summary; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>