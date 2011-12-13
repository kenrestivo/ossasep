<?php if ($model->status == 'New'){ ?>
      <em><strong>NEW:</strong></em>
          <?php } ?>

<strong><?php echo CHtml::link(CHtml::encode($model->class_name), array('/ClassInfo/view', 'id'=>$model->id)); ?></strong><br />

<?php
if($model->isCompany()){
    echo CHtml::encode($model->company->name);
} else {
    echo CHtml::encode(implode(' & ', 
                 array_map(
                     function($i) { return $i->full_name ; },
                     $model->instructors
                     )));
}
?>
<br />

<?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?>
 <br />
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> <br />
<?php echo CHtml::encode($model->location); ?>
