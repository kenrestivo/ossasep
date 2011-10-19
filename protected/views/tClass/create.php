<?php
$this->breadcrumbs=array(
	'Tclasses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TClass', 'url'=>array('index')),
	array('label'=>'Manage TClass', 'url'=>array('admin')),
);
?>

<h1>Create TClass</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>