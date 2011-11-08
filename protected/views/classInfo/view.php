<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Update ClassInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
);

xdebug_break();
?>

<h1>Class Details <?php echo $model->class_name; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_name',
		'min_grade_allowed',
		'max_grade_allowed',
		'start_time',
		'end_time',
		'description',
		'cost_per_class',
		'max_students',
		'day_of_week',
		'location',
		'status',
		'session.description',
	),
)); ?>


<h3>Student signups </h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'student-grid',
                        'dataProvider'=>new CArrayDataProvider(
                            $model->signups, 
                            array()),
                        'columns'=>array(
                            //'student.full_name',
                            //'class.class_name',
                            'signup',
                            'status',
                            array(
                                'class'=>'CompositeButtonColumn',
                                'modelClassName' => 'Signup',
                                'viewButtonUrl'=> 
                                    'Yii::app()->createUrl("/Signup/view", array("student_id" => $data["student_id"], "class_id" =>$data["student_id"]))',
                                'updateButtonUrl'=> '',
                                'deleteButtonUrl'=>'',
                                ),
                            ),
                        )); ?>
