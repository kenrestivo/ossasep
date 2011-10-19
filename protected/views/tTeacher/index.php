<?php
$this->breadcrumbs=array(
	'Tteachers',
);

$this->menu=array(
	array('label'=>'Create TTeacher', 'url'=>array('create')),
	array('label'=>'Manage TTeacher', 'url'=>array('admin')),
);
?>

<h1>Tteachers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
