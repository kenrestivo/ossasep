<?php 
echo CHTML::link("Add Class for " . $model->full_name, 
                 array("Signup/create",
                       'student_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      array('keyField' => 'student_id,class_id',
                          )),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'signup_date:datetime:Signed Up On',
                      'status:text:Status',
                      'scholarship:boolean:Scholarship',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
