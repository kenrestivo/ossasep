<?php
$this->breadcrumbs=array(
	'Class Meetings',
);

$this->menu=array(
	array('label'=>'Create ClassMeeting', 'url'=>array('create')),
	array('label'=>'Manage ClassMeeting', 'url'=>array('admin')),
);
?>

<h1>Class Meetings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
