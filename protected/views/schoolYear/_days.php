<?php 

$c = Yii::app()->db->createCommand();
$c->text = "select count(school_day) as count from school_calendar where school_year_id = 1;";
$r=$c->queryRow();




echo CHTML::link("Add Date to ". $model->description, 
                 array("SchoolCalendar/create",
                       'returnTo' => Yii::app()->request->requestUri));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'schoolcalendar-grid',
                  'dataProvider'=> new KArrayDataProvider($model->school_calendars),
                  'columns' => array(
                      'school_day',
                      'minimum',
                      'school_in_session',
                      'note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'SchoolCalendar',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

