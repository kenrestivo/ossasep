<?php
$this->breadcrumbs=array(
	'Tstudents',
);

$this->menu=array(
	array('label'=>'Create TStudent', 'url'=>array('create')),
	array('label'=>'Manage TStudent', 'url'=>array('admin')),
);
?>

<h1>Tstudents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
