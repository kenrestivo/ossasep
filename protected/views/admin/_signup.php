<h3>
<?php
if(Yii::app()->user->name != 'admin' ){
    echo CHtml::encode($model->class_name);
} else {
    echo CHtml::link(CHtml::encode($model->class_name), array('/ClassInfo/view', 'id'=>$model->id)); 
}
?>
</h3>

<p style="text-align:right;">
     <?= $model->gradeSummary('long') ?> <?= CHtml::encode($model->instructorNames(' and ')) ?>, 
     <?php echo CHtml::encode(ZHtml::weekdayTranslation($model->day_of_week)); ?>, 
     <?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?>, 
<?= CHtml::encode($model->location) ?>
</p>

<?php
     
    $this->renderPartial(
        '/classInfo/_meeting_formatted',
        array('model' => $model));



$kad = new KArrayDataProvider(
    $model->sortedSignups,
    array(
          'pagination' => false,
        ));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid-'. $model->id,
                  'dataProvider'=> $kad,
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'summaryText' => $model->summaryCounts,
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'student.contact:text:Contact',
                      'student.emergency_1:text:Emergency',
                      'student.emergency_2:text:Emergency 2',
                      'student.emergency_3:text:Emergency 3',
                      'student.public_email_address:email:Email',
                      'status:text:Status',
                      'note:ntext:Note',
                      'signup_date:datetime:Signed Up On', 
                      ),
                  )); 
?>

<p  class="advisorybreak"></p>