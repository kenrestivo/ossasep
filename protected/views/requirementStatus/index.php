<?php
$this->breadcrumbs=array(
	'RequirementStatus',
);

$this->menu=array(
	array('label'=>'Create RequirementStatus', 'url'=>array('create')),
	array('label'=>'Manage RequirementStatus', 'url'=>array('admin')),
);
?>

<h1>RequirementStatuss</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
