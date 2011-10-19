<?php
$this->breadcrumbs=array(
	'Tteachers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TTeacher', 'url'=>array('index')),
	array('label'=>'Manage TTeacher', 'url'=>array('admin')),
);
?>

<h1>Create TTeacher</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>