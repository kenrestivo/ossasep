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

<?php
$this->widget('CTabView',array(
    'activeTab'=>'tab2',
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'Static tab',
            'content'=>'Content for tab 1'
        ),
        'tab2'=>array(
            'title'=>'Render tab',
            'view' =>'_students'
        ),
        'tab3'=>array(
            'title'=>'Url tab',
            'url'=>Yii::app()->createUrl("site/index"),
        )
    ),
    'htmlOptions'=>array(
        'style'=>'width:500px;'
    )
));

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
echo CHTML::link("Add Student to Class", 
                 array("Signup/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
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
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>




<h3>Instructors</h3>
<?php 
echo CHTML::link("Add Instructor to Class", 
                 array("InstructorAssignment/create",
                       'returnTo' => Yii::app()->request->requestUri));
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
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>



<h3>Extra Fees</h3>
<?php 
echo CHTML::link("Add Extra Fee to Class", 
                 array("ExtraFee/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'extrafees-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->extra_fees),
                  'columns'=>array(
                      'description',
                      'amount',
                      array(
                          'class'=>'CButtonColumn'
                          ),
                      ),
                  )); ?>


