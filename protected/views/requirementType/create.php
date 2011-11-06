<?php
$this->breadcrumbs=array(
	'Requirement Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RequirementType', 'url'=>array('index')),
	array('label'=>'Manage RequirementType', 'url'=>array('admin')),
);
?>

<h1>Create RequirementType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>