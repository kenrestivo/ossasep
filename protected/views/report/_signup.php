<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
 <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php

     $raw = $model->latest_signups;
$count= count($raw) > $model->max_students ? count($raw) : $model->max_students;
$all=array();
$wo = 1;
for($i=0; $i < $count; $i++){
    if(isset($raw[$i])){
        $c=array();
        if($raw[$i]->status == 'Waitlist'){
            $c['order'] = $wo++;
        } else{
            $c['order'] = $i + 1;
        }
        $c['signup_date'] = $raw[$i]->signup_date;
        $c['full_name'] = $raw[$i]->student->full_name;
        $c['grade'] = $raw[$i]->student->grade;
        $c['contact'] = $raw[$i]->student->contact;
        $c['emergency_1'] = $raw[$i]->student->emergency_1;
        $c['emergency_2'] = $raw[$i]->student->emergency_2;
        $c['emergency_3'] = $raw[$i]->student->emergency_3;
        $c['parent_email'] = $raw[$i]->student->parent_email;
        $c['status'] = $raw[$i]->status;
        $c['note'] = $raw[$i]->note;
        $all[$i] = $c;
    } else {
        $all[$i]= array('order' => $i + 1);
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
                      'order:number:#',
                      'signup_date:datetime:Signed Up On', 
                      'full_name:text:Name',
                      'grade:grade:Grade',
                      'contact:text:Contact',
                      'emergency_1:text:Emergency',
                      'emergency_2:text:Emergency 2',
                      'emergency_3:text:Emergency 3',
                      'parent_email:text:Email',
                      'status:text:Status',
                      'note:ntext:Note',
                      ),
                  )); 
?>

