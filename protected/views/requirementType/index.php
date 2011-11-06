<?php
$this->breadcrumbs=array(
	'Requirement Types',
);

$this->menu=array(
	array('label'=>'Create RequirementType', 'url'=>array('create')),
	array('label'=>'Manage RequirementType', 'url'=>array('admin')),
);
?>

<h1>Requirement Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
