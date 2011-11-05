<?php
$this->breadcrumbs=array(
	'School Calendars',
);

$this->menu=array(
	array('label'=>'Create SchoolCalendar', 'url'=>array('create')),
	array('label'=>'Manage SchoolCalendar', 'url'=>array('admin')),
);
?>

<h1>School Calendars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
