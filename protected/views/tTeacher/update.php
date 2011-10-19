<?php
$this->breadcrumbs=array(
	'Tteachers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TTeacher', 'url'=>array('index')),
	array('label'=>'Create TTeacher', 'url'=>array('create')),
	array('label'=>'View TTeacher', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TTeacher', 'url'=>array('admin')),
);
?>

<h1>Update TTeacher <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>