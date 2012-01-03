<?php
$this->breadcrumbs=array(
	'InstructorAssignments'=>array('index'));

$this->menu=array(
	array('label'=>'List InstructorAssignment', 'url'=>array('index')),
	array('label'=>'Create InstructorAssignment', 'url'=>array('create')),
	array('label'=>'Update InstructorAssignment', 'url'=>array('update', 
                                                 'instructor_id'=>$model->instructor_id,
              'class_id' => $model->class_id)),
	array('label'=>'Delete InstructorAssignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'instructor_id'=>$model->instructor_id,
              'class_id' => $model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InstructorAssignment', 'url'=>array('admin')),
);
?>

<h1>View InstructorAssignment </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'instructor.full_name',
        'class.summary',
        'percentage'
	),
)); ?>
