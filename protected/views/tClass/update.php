<?php
$this->breadcrumbs=array(
	'Tclasses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TClass', 'url'=>array('index')),
	array('label'=>'Create TClass', 'url'=>array('create')),
	array('label'=>'View TClass', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TClass', 'url'=>array('admin')),
);
?>

<h1>Update TClass <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>