<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
 <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      array('keyField' => 'student_id,class_id',
                          )),
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

