<?php
$this->breadcrumbs=array(
	'Extra Fees'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExtraFee', 'url'=>array('index')),
	array('label'=>'Create ExtraFee', 'url'=>array('create')),
	array('label'=>'View ExtraFee', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExtraFee', 'url'=>array('admin')),
);
?>

<h1>Update ExtraFee <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>