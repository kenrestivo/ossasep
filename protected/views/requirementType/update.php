<?php
$this->breadcrumbs=array(
	'Requirement Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RequirementType', 'url'=>array('index')),
	array('label'=>'Create RequirementType', 'url'=>array('create')),
	array('label'=>'View RequirementType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RequirementType', 'url'=>array('admin')),
);
?>

<h1>Update RequirementType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>