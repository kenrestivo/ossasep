<?php 
echo CHTML::link("Receive New Paperwork for ". $model->full_name, 
                 array("RequirementStatus/create",
                       'instructor_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requiermentstatus-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->requirement_status, 
                      array('keyField' => 'requirement_type_id,instructor_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->requirement_type->description'),
                      'received',
                      'expired',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'RequirementStatus',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

