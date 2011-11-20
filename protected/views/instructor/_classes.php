
<?php 
echo CHTML::link("Add Class for Instructor", 
                 array("InstructorAssignment/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->class->class_name'),
                      'percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

