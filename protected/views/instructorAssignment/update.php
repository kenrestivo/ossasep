<?php
$this->breadcrumbs=array(
	'InstructorAssignments'=>array('index'),
	'Edit',
    );

?>

<h1>Update InstructorAssignment <?php echo $model->instructor->full_name. " " . $model->class->summary  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>