<?php
$this->breadcrumbs=array(
	'Check Incomes',
);

$this->menu=array(
	array('label'=>'Create CheckIncome', 'url'=>array('create')),
	array('label'=>'Manage CheckIncome', 'url'=>array('admin')),
);
?>

<h1>Check Incomes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
