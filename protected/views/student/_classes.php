<?php 
echo CHTML::link("Add Class for " . CHtml::encode($model->full_name), 
                 array("Signup/create",
                       'student_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups, 
                      ),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'status:text:Status',
                      'scholarship:boolean:Scholarship',
                      'signup_date:datetime:Signed Up On',
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
