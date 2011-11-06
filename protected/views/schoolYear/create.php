<?php
$this->breadcrumbs=array(
	'School Years'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SchoolYear', 'url'=>array('index')),
	array('label'=>'Manage SchoolYear', 'url'=>array('admin')),
);
?>

<h1>Create SchoolYear</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>