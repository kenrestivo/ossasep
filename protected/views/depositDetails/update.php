<?php
$this->breadcrumbs=array(
	'Deposit Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DepositDetails', 'url'=>array('index')),
	array('label'=>'Create DepositDetails', 'url'=>array('create')),
	array('label'=>'View DepositDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>Update DepositDetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>