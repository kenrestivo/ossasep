<?php
$this->breadcrumbs=array(
	'Tclasses',
);

$this->menu=array(
	array('label'=>'Create TClass', 'url'=>array('create')),
	array('label'=>'Manage TClass', 'url'=>array('admin')),
);
?>

<h1>Tclasses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
