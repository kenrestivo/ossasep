<?php
$this->breadcrumbs=array(
	'Incomes',
);

$this->menu=array(
	array('label'=>'Create Income', 'url'=>array('create')),
	array('label'=>'Manage Income', 'url'=>array('admin')),
);
?>

<h1>Incomes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
