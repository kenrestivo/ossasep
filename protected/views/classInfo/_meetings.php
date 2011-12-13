<?php 
$am=$model->active_meetings;
?>

<p><?= count($am) ?> meetings, <?= count($model->meetings) - count($am) ?> makeup day </p>


<?
if(count($am) < 1 ){
    echo CHTML::link("Auto-Populate Meeting Days for ". $model->class_name, 
                     array('populate','id' => $model->id));
    echo "<br />";
}

echo CHTML::link("Add 1 Meeting Date for ". $model->class_name, 
				 array("ClassMeeting/create",
                       'class_id' => $model->id,
					   'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'meetingdate-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->meetings),
                  'columns'=>array(
                      'meeting_date',
                      'note',
                      'makeup',
        'school_day.minimum',
        'school_day.day_off',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ClassMeeting',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
				  )); ?>


