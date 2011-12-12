<?php
$this->breadcrumbs=array(
	'School Calendars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SchoolCalendar', 'url'=>array('index')),
	array('label'=>'Create SchoolCalendar', 'url'=>array('create')),
	array('label'=>'View SchoolCalendar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SchoolCalendar', 'url'=>array('admin')),
);
?>

<h1>Update SchoolCalendar <?php echo $model->school_day; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>