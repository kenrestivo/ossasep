<?php
$this->breadcrumbs=array(
	'Check Expenses',
);

$this->menu=array(
	array('label'=>'Create CheckExpense', 'url'=>array('create')),
	array('label'=>'Manage CheckExpense', 'url'=>array('admin')),
);
?>

<h1>Check Expenses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
