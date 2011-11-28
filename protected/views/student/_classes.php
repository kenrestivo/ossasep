<?php 
echo CHTML::link("Add Class for " . $model->full_name, 
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
                            'value' => '$data->class->description'),
                      'signup_date',
                      'status',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
