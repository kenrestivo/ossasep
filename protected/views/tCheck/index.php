<?php
$this->breadcrumbs=array(
	'Tchecks',
);

$this->menu=array(
	array('label'=>'Create TCheck', 'url'=>array('create')),
	array('label'=>'Manage TCheck', 'url'=>array('admin')),
);
?>

<h1>Tchecks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
