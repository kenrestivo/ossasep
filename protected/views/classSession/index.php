<?php
$this->breadcrumbs=array(
	'Class Sessions',
);

$this->menu=array(
	array('label'=>'Create ClassSession', 'url'=>array('create')),
	array('label'=>'Manage ClassSession', 'url'=>array('admin')),
);
?>

<h1>Class Sessions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
