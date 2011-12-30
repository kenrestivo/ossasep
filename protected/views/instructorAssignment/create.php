<?php
$this->breadcrumbs=array(
	'InstructorAssignments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InstructorAssignment', 'url'=>array('index')),
	array('label'=>'Manage InstructorAssignment', 'url'=>array('admin')),
);
?>

<h1>Create InstructorAssignment
<?php
if(isset($model->class_id)){
    echo " for " . CHtml::encode($model->class->summary);
}
if(isset($model->instructor_id)){
    echo " for " . CHtml::encode($model->instructor->full_name);
}
?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>