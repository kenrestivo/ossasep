<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>Create Signup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>