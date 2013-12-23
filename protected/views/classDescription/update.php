<?php
$this->breadcrumbs=array(
	'Class Descriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Description <?php echo $model->language->description . " for " . $model->class->class_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>