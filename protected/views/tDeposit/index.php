<?php
$this->breadcrumbs=array(
	'Tdeposits',
);

$this->menu=array(
	array('label'=>'Create TDeposit', 'url'=>array('create')),
	array('label'=>'Manage TDeposit', 'url'=>array('admin')),
);
?>

<h1>Tdeposits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
