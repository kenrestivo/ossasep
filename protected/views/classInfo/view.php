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
                            array('name' => "Session",
                                  'value' =>  $model->session->fmtName()
                            ),
                            'note',
                        ),
                        )
    ); 
?>


<h3>Student signups </h3>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'student-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      array('keyField' => 'student_id,class_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->student->full_name'),
                      array('name' => "Grade",
                            'value' => '$data->student->grade'),
                      /// TODO fix the rest of these
                      'student.emergency_1',
                      'student.emergency_2',
                      'student.emergency_3',
                      'student.parent_email',
                      'signup',
                      'status',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          ),
                      ),
                  )); ?>



<h3>Instructors</h3>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->instructor->full_name'),
                      'percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          ),
                      ),
                  )); ?>
