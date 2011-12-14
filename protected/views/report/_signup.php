<h3><?= $model->class_name ?> <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      array('keyField' => 'student_id,class_id',
                          )),
                  'columns'=>array(
                      'student.full_name:text:Name',
                      array('name' => "Grade",
                            'value' => 'ZHtml::gradeFormat($data->student->grade)'),

                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.parent_email:text:Email',
                      'signup_date:date:Signed Up On', 
                      'status:text:Status',
                      // NOTE i am deliberately NOT showing scholarships here
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>

