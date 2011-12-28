<?php
$this->breadcrumbs=array(
	'Check Paid'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Check Paid', 'url'=>array('create')),
	array('label'=>'View Checks Paid', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Checks paid', 'url'=>array('admin')),
);
?>

<h1>Update Check <?php echo $model->summary; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>