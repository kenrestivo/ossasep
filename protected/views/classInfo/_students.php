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
