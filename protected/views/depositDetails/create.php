<?php
$this->breadcrumbs=array(
	'Deposit'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DepositDetails', 'url'=>array('index')),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>Create New Deposit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>