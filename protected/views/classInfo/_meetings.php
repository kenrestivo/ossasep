<?
   $am=$model->active_meetings;
    echo '<div><div class="span-11">';
if(count($am) > 0){
    echo CHtml::beginForm(array('populate', 'id' => $model->id));
echo "<span>Auto-populate " . ZHtml::weekdayTranslation($model->day_of_week). " meeting dates: </span>";
    echo CHtml::textField('num', 8, array('size' => 2));
    echo CHtml::submitButton('Add');
    echo CHtml::endForm();
echo '<br /> or ';
} else {
    echo "You already have meeting dates, delete them to auto-populate.";
}

echo CHTML::link(CHtml::encode("Add 1 Meeting Date for ". $model->summary), 
				 array("ClassMeeting/create",
                       'class_id' => $model->id,
					   'returnTo' => Yii::app()->request->requestUri));

    echo "</div><div class=\"span-9 last\">Your session settings are: " 
    . ZHtml::mediumDate($model->session->start_date). 
    " - "
    . ZHtml::mediumDate($model->session->end_date)
    . "  ";
    echo "</div>";
    echo '</div><div class="clear"></div>';
?>

<?php
?>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'meetingdate-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->meetings),
                  'summaryText' => "" . $model->active_mtg_count . " meetings, ". ($model->makeup_day_count ). " makeup day(s)",
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

