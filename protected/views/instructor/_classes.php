
<?php 
echo CHTML::link("Add Class for Instructor", 
                 array("InstructorAssignment/create",
                       'instructor_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments
                      ),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->class->summary'),
                      'percentage:percent',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

