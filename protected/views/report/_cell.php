<?php if ($model->status == 'New'){ ?>
      <em><strong>NEW:</strong></em>
          <?php } ?>

<strong><?php 
if(Yii::app()->user->isGuest){
    echo CHtml::encode($model->class_name);
} else {
    echo CHtml::link(CHtml::encode($model->class_name), array('/ClassInfo/view', 'id'=>$model->id)); 
}
?>
</strong><br />

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
