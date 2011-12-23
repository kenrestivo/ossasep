<?php 
$am=$model->active_meetings;
?>

<p><?= count($am) ?> meetings, <?= count($model->meetings) - count($am) ?> makeup day </p>


      <?
if(count($am) < 1 ){
    echo '<div><span class="span-10">';
    echo CHtml::beginForm(array('populate', 'id' => $model->id));
    echo "Auto-populate meeting dates: ";
    echo CHtml::textField('num', 8, array('size' => 2));
    echo CHtml::submitButton('Add');
    echo CHtml::endForm();

    echo "</span><span class=\"span-10 last\">Your session settings are: start " 
    . ZHtml::mediumDate($model->session->start_date). 
    ", end "
    . ZHtml::mediumDate($model->session->end_date)
    . "  ";
    echo CHTML::link("(edit)",
				 array("ClassSession/update",
                       'id' => $model->session_id,
					   'returnTo' => Yii::app()->request->requestUri));

    echo "</span>";
    echo "</div><br />";
}
?>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'meetingdate-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->meetings),
                  'columns'=>array(
                      'meeting_date:date:Date',
                      'note:ntext:Note',
                      'makeup:boolean:Make-Up',
                      'school_day.minimum:boolean:Minimum',
                      'school_day.day_off:boolean:Day Off',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ClassMeeting',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
				  )); ?>

<?php
echo CHTML::link("Add 1 Meeting Date for ". $model->class_name, 
				 array("ClassMeeting/create",
                       'class_id' => $model->id,
					   'returnTo' => Yii::app()->request->requestUri));
?>
