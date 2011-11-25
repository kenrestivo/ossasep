<?php
$this->breadcrumbs=array(
	'Signups',
);

$this->menu=array(
	array('label'=>'Create Signup', 'url'=>array('create')),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>Signups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
