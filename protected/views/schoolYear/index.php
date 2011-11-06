<?php
$this->breadcrumbs=array(
	'School Years',
);

$this->menu=array(
	array('label'=>'Create SchoolYear', 'url'=>array('create')),
	array('label'=>'Manage SchoolYear', 'url'=>array('admin')),
);
?>

<h1>School Years</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
