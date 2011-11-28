<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'));

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Create Signup', 'url'=>array('create')),
	array('label'=>'Update Signup', 'url'=>array('update', 
                                                 'student_id'=>$model->student_id,
              'class_id' => $model->class_id)),
	array('label'=>'Delete Signup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'student_id'=>$model->student_id,
              'class_id' => $model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>View Signup </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'student.first_name',
        'student.last_name',
        'class.class_name',
        'signup_date',
        'status',
        'note'
	),
)); ?>
