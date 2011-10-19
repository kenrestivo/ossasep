<?php
$this->breadcrumbs=array(
	'Tchecks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TCheck', 'url'=>array('index')),
	array('label'=>'Manage TCheck', 'url'=>array('admin')),
);
?>

<h1>Create TCheck</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>