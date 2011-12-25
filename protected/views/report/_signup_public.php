<h3><?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
     <?= $model->gradeSummary('short') ?> <?= CHtml::encode($model->instructorNames(' and ')) ?></h3>

<?php
     
$kad = new KArrayDataProvider(
    $model->sortedSignups,
    array('keyField' => 'student_id,class_id',
        ));

?>

