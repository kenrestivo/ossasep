<?php 
echo CHTML::link("Add Instructor to " . $model->class_name, 
                 array("InstructorAssignment/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      'instructor.full_name:text:Instructor',
                      'percentage:number:Percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

