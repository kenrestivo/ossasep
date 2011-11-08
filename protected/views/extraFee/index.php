<?php
$this->breadcrumbs=array(
	'Extra Fees',
);

$this->menu=array(
	array('label'=>'Create ExtraFee', 'url'=>array('create')),
	array('label'=>'Manage ExtraFee', 'url'=>array('admin')),
);
?>

<h1>Extra Fees</h1>

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
