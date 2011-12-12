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
                      array('name' => "Name",
                            'value' => '$data->student->full_name'),
                      array('name' => "Grade",
                            'value' => '$data->student->grade'),
                      /// TODO fix the rest of these
                      'student.emergency_1',
                      'student.emergency_2',
                      'student.emergency_3',
                      'student.parent_email',
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

