<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);
?>

<h1>Create ClassInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>