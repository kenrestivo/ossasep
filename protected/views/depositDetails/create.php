<?php
$this->breadcrumbs=array(
	'Deposit Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DepositDetails', 'url'=>array('index')),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>Create DepositDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>