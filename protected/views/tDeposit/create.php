<?php
$this->breadcrumbs=array(
	'Tdeposits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TDeposit', 'url'=>array('index')),
	array('label'=>'Manage TDeposit', 'url'=>array('admin')),
);
?>

<h1>Create TDeposit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>