<?php 
echo CHTML::link("Add Date to ". $model->description, 
                 array("SchoolCalendar/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'schoolcalendar-grid',
                  'dataProvider'=> new KArrayDataProvider($model->school_calendars),
                  'columns' => array(
                      'school_day',
                      'status',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'SchoolCalendar',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

