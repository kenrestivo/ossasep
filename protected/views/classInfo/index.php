<?php
$this->breadcrumbs=array(
	'Class Infos',
);

$this->menu=array(
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);
?>

<h1>Class Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
