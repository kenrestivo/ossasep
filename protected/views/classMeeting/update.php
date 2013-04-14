<?php
$this->breadcrumbs=array(
	'Class Meetings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update ClassMeeting <?php echo $model->meeting_date; ?> for <?= $model->class->summary ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>