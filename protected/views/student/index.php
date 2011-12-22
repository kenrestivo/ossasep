<?php
$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<p>NOTE: this is NOT USED FOR ANYTHING. it is cruft. we are using admin.php for this</p>