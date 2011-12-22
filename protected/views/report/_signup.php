<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
 <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php

$kad = new KArrayDataProvider(
    $model->sortedSignups,
    array('keyField' => 'student_id,class_id',
        ));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=> $kad,
                  'enablePagination' => false,
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'student.contact:text:Contact',
                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.parent_email:text:Email',
                      'status:text:Status',
                      'note:ntext:Note',
                      'signup_date:datetime:Signed Up On', 
                      ),
                  )); 
?>

