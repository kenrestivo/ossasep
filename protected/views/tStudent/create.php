<?php
$this->breadcrumbs=array(
	'Tstudents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TStudent', 'url'=>array('index')),
	array('label'=>'Manage TStudent', 'url'=>array('admin')),
);
?>

<h1>Create TStudent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>