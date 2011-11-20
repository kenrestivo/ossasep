<?php 
echo CHTML::link("Add Status to ". $model->full_name, 
                 array("RequirementStatus/create",
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

