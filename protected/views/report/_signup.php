<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
 <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php

$raw = $model->signups;
$count= count($raw) > $model->max_students ? count($raw) : $model->max_students;
$all=array();
for($i=0; $i < $count; $i++){
    if(isset($raw[$i])){
        $all[$i] = $raw[$i];
    } else {
        $all[$i]= new Signup;
        $all[$i]->status = 'Waitlist';
    }
}

$kad = new KArrayDataProvider(
    $all,
    array('keyField' => 'student_id,class_id',
        ));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=> $kad,
                  'enablePagination' => false,
                  'columns'=>array(
                      'signup_date:date:Signed Up On', 
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'student.contact:text:Contact',
                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.parent_email:text:Email',
                      'status:text:Status',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>

