<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'View ClassInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);
?>

<h1>Update ClassInfo <?php echo $model->summary; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>