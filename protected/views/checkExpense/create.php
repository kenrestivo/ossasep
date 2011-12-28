<?php
$this->breadcrumbs=array(
	'Check Expenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage CheckExpense', 'url'=>array('admin')),
);
?>

<h1>Create CheckExpense</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>