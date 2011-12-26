<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
     <?= $model->gradeSummary('long') ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php
     
$kad = new KArrayDataProvider(
    $model->sortedSignups,
    array('keyField' => 'student_id,class_id',
          'pagination' => false,
        ));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid-'. $model->id,
                  'dataProvider'=> $kad,
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'summaryText' => $model->summaryCounts,
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'student.contact:text:Contact',
                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.parent_email:email:Email',
                      'status:text:Status',
                      'note:ntext:Note',
                      'signup_date:datetime:Signed Up On', 
                      ),
                  )); 
?>

