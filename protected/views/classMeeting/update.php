<?php
$this->breadcrumbs=array(
	'Class Meetings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassMeeting', 'url'=>array('index')),
	array('label'=>'Create ClassMeeting', 'url'=>array('create')),
	array('label'=>'View ClassMeeting', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassMeeting', 'url'=>array('admin')),
);
?>

<h1>Update ClassMeeting <?php echo $model->meeting_date; ?> for <?= $model->class->summary ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>