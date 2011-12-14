<?php 
$am=$model->active_meetings;
?>

<p><?= count($am) ?> meetings, <?= count($model->meetings) - count($am) ?> makeup day </p>


      <?
if(count($am) < 1 ){
    echo '<div><span class="span-8">';
    echo CHtml::beginForm(array('populate', 'id' => $model->id));
    echo "Auto-populate meeting dates: ";
    echo CHtml::textField('num', 8, array('size' => 2));
    echo CHtml::submitButton('Add');
    echo CHtml::endForm();

    echo "</span><span class=\"span-8 last\">Your session settings are start: " . $model->session->start_date. ", end " . $model->session->end_date . "</span>";
    echo "</div><div><br />";
}
?>

<div style="clear:both;">

<?php
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


</div>