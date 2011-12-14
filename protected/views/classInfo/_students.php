<?php 

echo CHTML::link("Add Student to ". $model->class_name, 
                 array("Signup/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      array('keyField' => 'student_id,class_id',
                          )),
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'student.contact:text:Contact',
                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.parent_email:text:Email',
                      'signup_date',
                      'status',
                      // NOTE i am deliberately NOT showing scholarships here
                      'note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

