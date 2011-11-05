<?php
$this->breadcrumbs=array(
	'Deposit Details',
);

$this->menu=array(
	array('label'=>'Create DepositDetails', 'url'=>array('create')),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>Deposit Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
