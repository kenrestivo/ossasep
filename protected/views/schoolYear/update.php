<?php
$this->breadcrumbs=array(
	'School Years'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SchoolYear', 'url'=>array('index')),
	array('label'=>'Create SchoolYear', 'url'=>array('create')),
	array('label'=>'View SchoolYear', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SchoolYear', 'url'=>array('admin')),
);
?>

<h1>Update SchoolYear <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>