<?php
$this->breadcrumbs=array(
	'Class Sessions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassSession', 'url'=>array('index')),
	array('label'=>'Manage ClassSession', 'url'=>array('admin')),
);
?>

<h1>Create ClassSession</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>