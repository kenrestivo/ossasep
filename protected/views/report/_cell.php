<?php 
if ($model->status == 'New'){ 
      echo '<em><strong>NEW:</strong></em>';
  } 
?>

<strong><?php 
if(Yii::app()->user->isGuest){
    echo CHtml::encode($model->class_name);
} else {
    echo CHtml::link(CHtml::encode($model->class_name), array('/ClassInfo/view', 'id'=>$model->id)); 
}
?>
</strong>
<?php
if($model->enrolled_count >= $model->max_students){
      echo '<span class="full">FULL</span>';
} 
?>
<br />

<?php
if($model->isCompany()){
    echo CHtml::encode($model->company->name);
} else {
    echo CHtml::encode($model->instructorNames(' & '));
}
?>
<br />

<?= $model->gradeSummary('long') ?>
 <br />
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> <br />
<?php echo CHtml::encode($model->location); ?>
