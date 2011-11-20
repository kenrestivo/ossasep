<?php 
echo CHTML::link("Add Meeting Date for ". $model->class_name, 
      array("ClassMeeting/create",
            'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'meetingdate-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->class_meetings),
                  'columns'=>array(
                      'meeting_date',
                      'note',
                      array(
                          'class'=>'CButtonColumn'
                          'modelClassName' => 'ClassMeeting',
                          'returnTo' => Yii::app()->request->requestUri

                          ),
                      ),
)); ?>


