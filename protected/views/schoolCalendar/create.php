<?php
$this->breadcrumbs=array(
	'School Calendars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SchoolCalendar', 'url'=>array('index')),
	array('label'=>'Manage SchoolCalendar', 'url'=>array('admin')),
);
?>

<h1>Create SchoolCalendar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>