<?php 

$c = Yii::app()->db->createCommand();
$c->text = "select count(school_day) as count from school_calendar where school_year_id = :schoolyearid;";
$r=$c->queryRow(true, array('schoolyearid' => $model->id));


if($r['count'] < 1 ){
    echo CHTML::link("Auto-Populate School Days for ". $model->description, 
                     array('populate','id' => $model->id));
    echo "<br />";
}


echo CHTML::link("Add Date to ". $model->description, 
                 array("SchoolCalendar/create",
                       'returnTo' => Yii::app()->request->requestUri));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'schoolcalendar-grid',
                  'dataProvider'=> new KArrayDataProvider($model->school_calendars),
                  'columns' => array(
                      'school_day:date:Date',
                      'minimum:boolean:Minimum',
                      'day_off:boolean:Day Off',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'SchoolCalendar',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

