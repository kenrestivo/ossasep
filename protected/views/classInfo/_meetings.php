<?php 

$c = Yii::app()->db->createCommand("select count(meeting_date) as count from class_meeting where class_id = :classid;");
$r=$c->queryRow(true, array('classid' => $model->id));


if($r['count'] < 1 ){
    echo CHTML::link("Auto-Populate Meeting Days for ". $model->class_name, 
                     array('populate','id' => $model->id));
    echo "<br />";
}




echo CHTML::link("Add Meeting Date for ". $model->class_name, 
				 array("ClassMeeting/create",
                       'class_id' => $model->id,
					   'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'meetingdate-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->class_meetings),
                  'columns'=>array(
                      'meeting_date',
                      'note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ClassMeeting',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
				  )); ?>


