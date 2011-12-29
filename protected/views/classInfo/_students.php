<?php 

echo CHTML::link(CHtml::encode("Add Student to ". $model->summary), 
                 array("Signup/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->sortedSignups),
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
                      'signup_date:datetime:Signed Up On',
                      'status:text:Status',
                      // NOTE i am deliberately NOT showing scholarships here
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

